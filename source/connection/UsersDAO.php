<?php

class UsersDAO
{
    final public static function getMaxUser()
    {
        return "SELECT MAX(`idUser`) count FROM `user` ";
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

}

new UsersDAO();
