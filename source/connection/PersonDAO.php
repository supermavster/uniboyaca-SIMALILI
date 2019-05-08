<?php

class PersonDAO
{
    final public static function addPerson($values)
    {
        $sql = "INSERT INTO `person` (`idPerson`, `firstName`, `lastName`, `TypeDocument`, `NumberDocument`, `birthday`, `rh`,`eps`, `religion`, `phone`) VALUES (NULL ,";
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

new PersonDAO();
