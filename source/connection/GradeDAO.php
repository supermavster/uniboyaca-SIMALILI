<?php


class GradeDAO
{
    final public static function addGrade($value)
    {
        return "INSERT INTO `grado` (`id_Grado`, `Nombre`) VALUES (NULL, '$value')";
    }

    final public static function getNameGrades()
    {
        return "SELECT `Nombre` FROM `grado`";
    }

    final public static function updateName($oldName, $newName)
    {
        return "UPDATE `grado` SET `Nombre` = '$newName' WHERE `grado`.`Nombre` = '$oldName';";
    }

    final public static function deleteName($name)
    {
        return "DELETE FROM `grado` WHERE `grado`.`Nombre` = '$name'";
    }


    final public static function selectName($name)
    {
        return "SELECT * FROM `grado` WHERE `Nombre` LIKE '%$name%'";
    }


}

new GradeDAO();