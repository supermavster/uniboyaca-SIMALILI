<?php


class SubjectDAO
{

    final public static function addGrade($values)
    {
        $sql = "INSERT INTO `asignatura` (`Cod_Asignatur`, `Nombre_asignatura`, `Estado`, `Asignatura_curso_idAsignatura_curso`, `Asignatura_curso_Curso_id_curso`, `Asignatura_curso_Curso_Grado_id_Grado`, `Docente_idDocente`, `Docente_idDocente1`, `Grado_id_Grado`) VALUES (";
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