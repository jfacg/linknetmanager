<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    private $profile, $user;

    public function __construct(Profile $profile, User $user){
        $this->user = $user; 
        $this->profile = $profile; 
        $this->middleware(['can:super']);
    }

    public function profiles($idUser)
    {
        $user = $this->user->find($idUser);
        
        if(!$user)
            return redirect()->back();
        
        $profiles = $user->profiles()->paginate();

        return view('admin.pages.users.profiles.profiles', compact('profiles', 'user'));
    }

    public function profilesAvailable(Request $request, $idUser)
    {
        if(!$user = $this->user->find($idUser))
            return redirect()->back();
        

        $filters = $request->except('_token');

        $profiles = $user->profilesAvailable($request->filter);

        return view('admin.pages.users.profiles.available', compact('profiles', 'user', 'filters'));
    }

    public function attachProfilesUser(Request $request, $idUser)
    {

        if(!$user = $this->user->find($idUser))
            return redirect()->back();
        
        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                    ->back()
                    ->with('info', 'Escolha pelo menos uma permissão');
        }

        $user->profiles()->attach($request->profiles);

        return redirect()->route('users.profiles', $idUser);
    }

    public function detachProfilesUser($idUser, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        $user = $this->user->find($idUser);

        if(!$profile || !$user)
            return redirect()->back();

        $user->profiles()->detach($profile);

        return redirect()->route('users.profiles', $idUser);
    }
}
