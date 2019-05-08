<?php


class GradeDAO
{
    final public static function addGrade($value)
    {

        return "INSERT INTO `grade` (`idGrade`, `nameGrade`) VALUES (NULL, '$value')";
    }

    final public static function getNameGrades()
    {
        return "SELECT `nameGrade` FROM `grade`";
    }

    final public static function updateName($oldName, $newName)
    {
        return "UPDATE `grade` SET `nameGrade` = '$newName' WHERE `nameGrade` = '$oldName';";
    }

    final public static function deleteName($name)
    {
        return "DELETE FROM `grade` WHERE `nameGrade` = '$name'";
    }


    final public static function selectName($name)
    {
        return "SELECT * FROM `grade` WHERE `nameGrade` LIKE '%$name%'";
    }


}

new GradeDAO();