<?php

namespace App\Http\Controllers\Profil;

use App\Http\Access\Authorize;
use App\Http\Requests\Profil\ProfilRequest;
use App\Model\media;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    use Authorize;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recovered');
    }

    public function update(ProfilRequest $request,$id)
    {
        if($this->self((int) $id)){
            $user = User::findOrFail($id);
            Storage::disk('uploads')->delete($user->profil);
            $path = Storage::disk('uploads')->put('images/profil', $request->profil);

            $user->update(['profil' => $path]);
            return redirect()->route('profil.show',$user);
        }
        abort(404);
    }
}
