<?php


class DocentDAO
{
    final public static function addDocent($maxID, $values)
    {

        // Docent
        $sql = "INSERT INTO `docente` (`idDocente`, `Nombre_Completo`, `Lugar_nacimiento`, `Fecha_Nacimiento`, `Edad`, `Religion`, `Titulo_profesional`, `Titulo_documento`, `Num_id`, `Fecha_Registro`, `Fecha_fin`, `Estado`, `Usuarios_idUsuarios`) VALUES ( NULL,";
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

new DocentDAO();