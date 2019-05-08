<?php

class SignInAndSignUpDAO
{
    final public static function getMaxUsers()
    {
        return "SELECT max(`idUsuarios`) FROM `usuarios`";
    }

    final public static function getUsers()
    {
        return "SELECT `Documento_id` FROM `usuarios`";
    }

    final public static function getDataUserByID($id)
    {
        return "SELECT * FROM `user` WHERE `user` = '$id'";
    }

    final public static function getNameByUser($username)
    {
        return "SELECT person.`firstName` FROM `institutionalcharge`  institutionalcharge, `person` person, `user` user WHERE 
    institutionalcharge.`idPerson` = user.idInstitutionalCharge and
institutionalcharge.`idPerson` = person.idPerson and user.`user` = '$username'";
    }

    final public static function getChargeByUser($username)
    {
        return "SELECT institutionalcharge.`charge` FROM `institutionalcharge` institutionalcharge,  user user WHERE institutionalcharge.`idPerson` = user.idInstitutionalCharge and user.`user` = '$username'";
    }

    final public static function getDataUser($username)
    {
        return "SELECT user.user,institutionalcharge.charge,person.`firstName`,person.lastName FROM `institutionalcharge`  institutionalcharge, `person` person, `user` user WHERE 
    institutionalcharge.`idPerson` = user.idInstitutionalCharge and
institutionalcharge.`idPerson` = person.idPerson and user.`user` = '$username'";
    }
}

new SignInAndSignUpDAO();
