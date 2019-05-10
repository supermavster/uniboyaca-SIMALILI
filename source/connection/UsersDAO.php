<?php

class UsersDAO
{
    final public static function getMaxUser()
    {
        return "SELECT MAX(`idUser`) count FROM `user` ";
    }

    final public static function getUser($username)
    {
        return "SELECT 
person.firstName, person.lastName, person.TypeDocument, person.NumberDocument, person.birthday, person.rh, person.eps, person.religion, person.phone, 
institutionalcharge.charge, institutionalcharge.initDate, institutionalcharge.endDate, institutionalcharge.enable,
user.user, user.password
FROM 
`institutionalcharge` institutionalcharge , `user` user, `person` person
WHERE
institutionalcharge .`idPerson` = user.`idInstitutionalCharge`
AND
person.idPerson = institutionalcharge.idPerson
and user.`user` = '" . $username . "'";
    }


    final public static function getNameUsers()
    {
        return "SELECT `user` FROM `user` ";
    }

    final public static function addUser($values)
    {

        // User
        $sql = "INSERT INTO `user` (`idUser`, `idInstitutionalCharge`, `user`, `password`)  VALUES ($values[idPerson] ,$values[idPerson] ,";
        $values = $values['user'];
        $tempValue = 0;
        foreach ($values as $valor) {
            $sql .= "'$valor'";
            if ($tempValue++ == count($values) - 1) {
                $sql .= ");";
                break;
            } else {
                $sql .= ",";
            }
        }
        return $sql;
    }

    final public static function updateUser($values)
    {
        $values = $values['user'];
        return "UPDATE `user` SET `password` = '$values[password]' WHERE `user`.`user` = '$values[ciberusuario]';";

    }

    final public static function deleteUser($values)
    {
        $values = $values['user'];
        return "DELETE FROM `user` WHERE `user` = '$values[ciberusuario]'";
    }

}

new UsersDAO();
