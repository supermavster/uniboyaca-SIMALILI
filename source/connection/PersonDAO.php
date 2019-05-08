<?php

class PersonDAO
{
    final public static function getMaxID()
    {
        return "SELECT MAX(idPerson) FROM person;";
    }

    final public static function addPerson($values)
    {
        $sql = "INSERT INTO `person` (`idPerson`, `firstName`, `lastName`, `TypeDocument`, `NumberDocument`, `birthday`, `rh`,`eps`, `religion`, `phone`) VALUES ($values[idPerson] ,";
        $values = $values['person'];
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

new PersonDAO();
