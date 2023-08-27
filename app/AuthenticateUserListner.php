<?php

namespace App;

interface AuthenticateUserListner {

    public function userHasLoggedIn($user);
}