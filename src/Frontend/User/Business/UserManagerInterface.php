<?php

namespace App\Frontend\User\Business;

use App\Generated\UserDataProvider;

interface UserManagerInterface
{
    public function delete(UserDataProvider $user): void;

    public function save(UserDataProvider $user): void;
}