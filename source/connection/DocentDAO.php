<?php


class DocentDAO
{
    final public static function addDocent($values)
    {
        // Docent
        $sql = "INSERT INTO `docent` (`idPerson`, `jobTitle`, `initDate`, `endDate`, `enable`) VALUES ($values[idPerson],";
        //'1', 'q', '2019-05-15', '2019-05-15', '1');
        $values = $values['docent'];
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

    final public static function updateDocent($values)
    {  // Docent
        $idPerson = $values['id'];
        $values = $values['docent'];
        $sql = "UPDATE `docent` SET `jobTitle` = '$values[jobTitle]', `initDate` = '$values[initDate]', `endDate` = '$values[endDate]', `enable` = '$values[enable]' WHERE `docent`.`idPerson` = $idPerson;";
        return $sql;
    }


    final public static function getNames()
    {
        return "SELECT person.NumberDocument NumberDocument FROM `person` person, `docent` docent WHERE docent.idPerson = person.idPerson";
    }

    final public static function getDocent($id)
    {
        return "SELECT 
person.firstName, person.lastName, person.TypeDocument, person.NumberDocument, person.birthday, person.rh, person.eps, person.religion, person.phone, 
docent.jobTitle, docent.initDate, docent.endDate, docent.enable
FROM 
`docent` docent , `user` user, `person` person
WHERE
person .`idPerson` = docent.`idPerson`
and person.NumberDocument = '" . $id . "'";
    }


    final public static function deleteDocent($values)
    {
        $values = $values['id'];
        return "DELETE FROM `docent` WHERE `docent`.`idPerson` = '$values'";
    }


}

new DocentDAO();