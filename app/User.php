<?php

namespace App;

use App\Model\Info;
use App\Model\Post;
use App\Model\Recover;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'profil', 'cover',
        'recover_id',
        'created_at','updated_at'
    ];

    public $guarded = ['is_admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function info()
    {
        return $this->hasOne(Info::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function recover()
    {
        return $this->hasOne(Recover::class);
    }

    public static function target($name)
    {
        return self::where('email',$name)->orWhere('name',$name)->first();
    }

    /**
     * insert new password
     * @param $id
     * @param $password
     * @return mixed
     */
    public static function updatePassword($id, $password)
    {
        return self::where('recover_id',$id)->update([
            'password' => bcrypt($password)
        ]);
    }

    /**
     * insert in old password
     * @param $recover_id
     */
    public static function updateOldPassword($recover_id)
    {
        $password = self::where('recover_id',$recover_id)->first();
        DB::table('old_passwords')->insert([
            'recover_id' => $recover_id,
            'password' => $password->password,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * clean db of the irrecoverable users
     * @return mixed
     */

    public static function cleanIrrecoverable()
    {
        return self::where([
            ['recover_id',null],
            ['created_at', '<', \gmdate('Y-m-d H:i:s',strtotime(" -3 day"))]
        ])->delete();
    }
}
