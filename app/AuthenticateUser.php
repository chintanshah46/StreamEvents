<?php 

namespace App;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticateUser {

    private $users;

    private $socialite;

    private $auth;

    private $driver;

    public function __construct(UserRepository $users, Socialite $socialite, Auth $auth)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
        
        $this->driver = '';
    }

    public function execute($driver, $hasCode, AuthenticateUserListner $listner){
        $this->driver = $driver;

        if (!$hasCode) return $this->getAuthorizationFirst();

        $user = $this->users->findByEmailOrCreate($this->getDriverUser());

        $this->auth::login($user, true);

        return $listner->userHasLoggedIn($user);      
    }

    private function getAuthorizationFirst(){

        return $this->socialite::driver($this->driver)->stateless()->redirect();
        
    }

    private function getDriverUser(){

        return $this->socialite::driver($this->driver)->stateless()->user();

    }
}