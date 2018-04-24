<?php

namespace App\Http\Controllers\Profil;

use App\Http\Access\Authorize;
use App\Http\Requests\Profil\CoverRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{

    use Authorize;


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recovered');
    }

    public function update(CoverRequest $request,$id)
    {
        if($this->self((int) $id)){
            $user = User::findOrFail($id);
            Storage::disk('uploads')->delete($user->cover);
            $path = Storage::disk('uploads')->put('images/cover', $request->cover);
            $user->update(['cover' => $path]);
            return redirect()->route('profil.show',$user);
        }
        abort(404);
    }
}
