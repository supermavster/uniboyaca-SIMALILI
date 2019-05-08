<?php

class UsersDAO
{
    final public static function getMaxUser()
    {
        return "SELECT MAX(`idUser`) count FROM `user` ";
    }

    final public static function addUser($maxID, $values)
    {

        // User
        $sql = "INSERT INTO `user` (`idUser`, `idInstitutionalCharge`, `user`, `password`) VALUES (";
        $tempValue = 0;
        foreach ($values as $clave => $valor) {
            $sql .= "'$valor'";
            if ($tempValue++ == count($values) - 3) {
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
