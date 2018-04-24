<?php

namespace App\Http\Access;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


trait Authorize
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    protected function isAdmin()
    {
        return Auth::user()->is_admin;
    }

    protected function self(int $id) :bool
    {
        return Auth::user()->id === $id;
    }

    protected function isColleagues($id,$society_id = null)
    {
        return User::findOrFail($id)->society_id === $society_id;
    }

    protected function colleagues(int $id,$society_id) : bool
    {
        if($this->isAdmin()){
            return true;
        }
        elseif ($this->self($id)){
            return true;
        }
        elseif ($this->isColleagues((int) $id,(int) $society_id)){
            return true;
        }
        return false;
    }

    protected function isMembre() :bool
    {
        return (DB::table('users')->where([
            ['id', Auth::user()->id],
            ['society_id',null]
        ]))->first() ? true : false;
    }


}