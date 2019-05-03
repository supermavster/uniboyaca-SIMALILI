<?php


class StudentDAO
{

    final public static function addStudent($maxID, $values)
    {
        // Docent
        $sql = "\"INSERT INTO `estudiante` (`idEstudiante`, `Nombre_Completo`, `Lugar_nacimiento`, `Fecha_nac`, `Edad`, `Religion`, `Nombre_tutor`, `Tipo_estudiante`, `Codigo_estudiante`, `Num_ID`) VALUES ( NULL,";
        $tempValue = 0;
        foreach ($values as $clave => $valor) {
            $sql .= "'$valor'";
            if ($tempValue++ == count($values) - 3) {
                $sql .= ",'Activo',$maxID);";
                break;
            } else {
                $sql .= ",";
            }
        }
        return $sql;
    }
}


new StudentDAO();