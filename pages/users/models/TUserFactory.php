<?php


namespace user\models;

class TUserFactory
{

    public static function createNullUser(){
        return new TUser();
    }

    public static function createEmptyUser(){

        $user =  new TUser();

        $user->setSurname('');
        $user->setFirstName('');
        $user->setLogin('');
        $user->setPassword('');
        $user->setEmail('');
        $user->setRole('');

        return $user;
    }

    public static function createFullUser($surname, $firstName,
       $login, $password, $email, $role)
    {
        $user = new TUser();

        $user->setSurname($surname);
        $user->setFirstName($firstName);
        $user->setLogin($login);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setRole($role);

        return $user;
    }

}