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

    final public static function updateDocent($values)
    {/*
    $values = array(
                "Nombre_Completo" => $data['name'] . " " . $data['lastName'],
                "Lugar_nacimiento" => $data['birthplace'],
                "Fecha_Nacimiento" => $data['birthday'],
                "Edad" => $data['years'],
                "Religion" => $data['religion'],
                "Titulo_profesional" => $data['profession'],
                "Titulo_documento" => $data['typeID'],
                "Num_id" => $data['numberID'],
                "Fecha_Registro" => $registerDate,
                "Fecha_fin" => $endDate,
                "Estado" => $data['eps'],
                "Usuarios_idUsuarios" => $data['birthplace']
            );

    */
        // Docent
        $sql = "UPDATE `docente` SET `Nombre_Completo` = '$values[Nombre_Completo]', `Lugar_nacimiento` = '$values[Nombre_Completo]', `Fecha_Nacimiento` = '$values[Nombre_Completo]', `Edad` = '$values[Nombre_Completo]', `Religion` = '$values[Nombre_Completo]', `Titulo_profesional` = '$values[Nombre_Completo]', `Titulo_documento` = '$values[Nombre_Completo]', `Num_id` = '$values[Nombre_Completo]', `Fecha_Registro` = '$values[Nombre_Completo]', `Fecha_fin` = '$values[Nombre_Completo]' WHERE `docente`.`Usuarios_idUsuarios` = $values[Usuarios_idUsuarios];";
        return $sql;
    }


    final public static function getNameDocents()
    {
        return "SELECT `Nombre_Completo` FROM `docente`";
    }

    final public static function getDocent($name)
    {
        return "SELECT * FROM `docente` where `Nombre_Completo`  = '$name'";
    }


    final public static function deleteName($name)
    {
        return "DELETE FROM `docente` WHERE `Nombre_Completo` = '$name'";
    }



}

new DocentDAO();