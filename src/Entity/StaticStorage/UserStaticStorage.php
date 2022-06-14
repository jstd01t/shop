<?php

namespace App\Entity\StaticStorage;

class UserStaticStorage
{
    public const USER_ROLE_USER = 'ROLE_USER';
    public const ADMIN_ROLE_USER = 'ROLE_ADMIN';

    public static function getUserRolesChoices():array
    {
        return [
            self::ADMIN_ROLE_USER => 'Admin',
        ];
    }
}