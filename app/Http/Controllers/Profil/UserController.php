<?php

namespace App\Http\Controllers\Profil;

use App\Http\Access\Authorize;
use App\Http\Requests\Profil\UserUpdateRequest;
use App\Model\Secret_question;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use Authorize;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recovered');
    }
    public function edit($id)
    {
        if($this->self($id)){
            $user = User::findOrFail($id);
            $questions = Secret_question::all();
            return view('profil.user.edit',compact('user','questions'));
        }
        abort(404);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        if($this->self($id)){
            if($request->response){
                DB::table('recovers')->where('user_id',$id)->update([
                    'response' => $request->response,
                    'question_secrete_id' => $request->question,
                    'updated_at' => Carbon::now()
                ]);
            }
            if($request->password){
                DB::table('users')->where('id',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now()
                ]);
            }
            $email = $this->checkChangeEmail($request->email,$id);
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => Carbon::now()
            ]);
            if($email){
                $this->changeEmail($email);
                return redirect()->route('recover');
            }
            return redirect()->route('profil.show',compact('id'));
        }
        abort(404);
    }

    private function checkChangeEmail($email,$id)
    {
        return DB::table('users')->where([['email','!=',$email],['id',$id]])->first();
    }

    private function changeEmail($user)
    {
        DB::table('recovers')->where('id',$user->recover_id)->update([
            'email' => false,
            'token' => rand()
        ]);
    }
}
