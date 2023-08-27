<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\AuthenticateUser;
use Illuminate\Http\Request;
use App\AuthenticateUserListner;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller implements AuthenticateUserListner
{

    public function authLogin(AuthenticateUser $authenticatesUser, Request $request){

        return $authenticatesUser->execute($request->input('driver'), $request->has('code'), $this);

    }

    public function userHasLoggedIn($user){
        return redirect('home');
    }
}
