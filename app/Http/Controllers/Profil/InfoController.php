<?php

namespace App\Http\Controllers\Profil;

use App\Http\Access\Authorize;
use App\Http\Requests\Profil\InfoRequest;
use App\Model\Info;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{

    use Authorize;


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recovered');
    }


    public function create()
    {
        $user = User::findOrFail(Auth::id());
        if(empty($user->info->created_at)){
            return view('profil.info.create');
        }else{
            return redirect()->route('info.edit',$user);
        }

    }

    public function store(InfoRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        if($this->self((int) $user->id)){
            $user->info()->create($request->all());
            $id = $user->id;
            return redirect()->route('profil.show',compact('id'));
        }
        abort(404);
    }

    public function edit($id)
    {
        if($this->self((int) $id)){
            $user = User::findOrFail($id);
            return view('profil.info.edit',compact('user'));
        }
        abort(404);
    }

    public function update(InfoRequest $request, $id)
    {
        if($this->self((int) $id)){
            $user = User::findOrFail($id);
            $user->info->update($request->all());
            $id = $user->id;
            return redirect()->route('profil.show',compact('id'));
        }
       abort(404);
    }
}
