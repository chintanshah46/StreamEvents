<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository{

    public function findByEmailOrCreate($userData){
        $user = User::where('email',$userData->email)->where('provider_id',$userData->id)->first();

        if(!$user){
            $user = new User();

            $user->provider_id = $userData->id;
            $user->username = $userData->nickname ?? $userData->email;
            $user->name = $userData->name;
            $user->email = $userData->email;
            $user->avatar = $userData->avatar;

            $user->save();
        }

        return $user;
    }

}