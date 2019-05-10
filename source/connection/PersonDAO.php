<?php

class PersonDAO
{
    final public static function getID($id)
    {
        return "SELECT institutionalcharge.`idPerson` FROM `institutionalcharge` institutionalcharge, `user` user WHERE user.`idInstitutionalCharge` = institutionalcharge.idPerson AND user.user = '$id'";
    }

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

    final public static function updatePerson($values)
    {
        $idPerson = $values['id'];
        $values = $values['person'];
        // ``, ``, ``, ``, ``,``, ``, ``
        $sql = "UPDATE `person` SET `firstName` = '$values[firstName]',  `lastName` = '$values[lastName]', `TypeDocument` = '$values[TypeDocument]', `NumberDocument` = '$values[NumberDocument]', `birthday` = '$values[birthday]', `rh` = '$values[rh]', `eps` = '$values[eps]', `religion` = '$values[religion]', `phone` = '$values[phone]' where person.idPerson = $idPerson;";
        return $sql;
    }

}

new PersonDAO();
