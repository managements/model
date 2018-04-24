<?php

namespace App\Http\Controllers\Profil;

use App\Http\Access\Authorize;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{

    use Authorize;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recovered');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->isAdmin()){
            $output = User::where('recover_id','!=',null)->get();
            return view('profil.index',compact('output'));
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $output = User::findOrFail($id);
        if($this->self((int)$output->id) || $this->isAdmin()){
            return view('profil.show',compact('output'));
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
