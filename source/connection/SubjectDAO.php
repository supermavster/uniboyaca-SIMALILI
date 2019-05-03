<?php


class SubjectDAO
{

    final public static function addSubject($values)
    {
        $sql = "INSERT INTO `asignatura` (`Cod_Asignatur`, `Nombre_asignatura`, `Estado`, `Asignatura_curso_idAsignatura_curso`, `Asignatura_curso_Curso_id_curso`, `Asignatura_curso_Curso_Grado_id_Grado`, `Docente_idDocente`, `Docente_idDocente1`, `Grado_id_Grado`) VALUES ('1', NULL, NULL, '123', '14', '1', '15', NULL, '8');";
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

    final public static function getName()
    {
        return "SELECT `Nombre_asignatura` FROM `asignatura`";
    }


}

new SubjectDAO();