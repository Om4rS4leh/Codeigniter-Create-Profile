<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function check($password, $dbPassword)
    {
        return password_verify($password, $dbPassword) ? true : false;
    }
    public static function emailCode()
    {
        return md5(uniqid(rand(), true));
    }
}
