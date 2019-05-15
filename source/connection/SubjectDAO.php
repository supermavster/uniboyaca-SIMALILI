<?php


class SubjectDAO
{

    final public static function addSubject($values)
    {
        $sql = "INSERT INTO `subject`(`idSubject`, `nameSubject`, `idDocent`, `idGrade`) VALUES (";
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

    final public static function getName()
    {
        return "SELECT `nameSubject` FROM `subject`";
    }


    final public static function getIDbyName($name)
    {
        return "SELECT `idCourse` FROM `course` WHERE `nameCourse` LIKE '%$name%'";
    }

}

new SubjectDAO();