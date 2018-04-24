<?php

namespace App\Http\Controllers\Auth;

use App\Rules\DtnRule;
use App\Rules\PasswordRule;
use App\Rules\SexRule;
use App\Rules\TelRule;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255|unique:users',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => ['required',new PasswordRule(),'min:6','confirmed'],
            'first_name'    => 'nullable|string|min:2|max:10',
            'last_name'     => 'nullable|string|min:2|max:20',
            'dtn'           => ['nullable',new DtnRule()],
            'sex'           => ['nullable','string','min:5','max:5', new SexRule()],
            'address'       => 'nullable|string|min:10|max:30',
            'house_nbr'     => 'nullable|string|min:1|max:6',
            'city'          => 'nullable|string|min:3|max:20',
            'tel'           => ['nullable','string','min:10','max:10',new TelRule()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $info = $this->createInfo($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'info_id' => $info,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }

    /**
     * create info
     * @param $data
     * @return int|null
     */

    private function createInfo(array $data)
    {
        if(
            !is_null($data['last_name']) ||
            !is_null($data['first_name']) ||
            !is_null($data['sex']) ||
            !is_null($data['dtn']) ||
            !is_null($data['tel']) ||
            !is_null($data['address']) ||
            !is_null($data['house_nbr']) ||
            !is_null($data['city'])
        ){
            return DB::table('infos')->insertGetId([
                'first_name' => (isset($data['first_name'])) ? $data['first_name'] : null,
                'last_name' => (isset($data['last_name'])) ? $data['last_name'] : null,
                'sex' => (isset($data['sex'])) ? $data['sex'] : null,
                'dtn' => (isset($data['dtn'])) ? $data['dtn'] : null,
                'tel' => (isset($data['tel'])) ? $data['tel'] : null,
                'address' => (isset($data['address'])) ? $data['address'] : null,
                'house_nbr' => (isset($data['house_nbr'])) ? $data['house_nbr'] : null,
                'city' => (isset($data['city'])) ? $data['city'] : null,
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);
        }
    }

    /**
     * The user has been registered.
     *
     * @param  Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('recover');
    }
}
