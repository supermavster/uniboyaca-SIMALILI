<?php

class UsersDAO
{
    final public static function getMaxUser()
    {
        return "SELECT MAX(`idUser`) count FROM `user` ";
    }

    final public static function addUser($maxID, $values)
    {

        // User
        $sql = "INSERT INTO `usuarios` (`idUsuarios`, `Nombre`, `Documento_id`, `Cargo`, `Fecha_inicio`, `Fecha_fin`, `Contraseña`, `Estado`) VALUES ($maxID,";
        foreach ($values as $clave => $valor) {
            if ($clave == "Nombre_Completo") {
                $sql .= "'$valor',";
            } elseif ($clave == "Num_id") {
                $sql .= "'$valor','Ninguno',";
            } elseif ($clave == "Fecha_Registro") {
                $sql .= "'$valor',";
            } elseif ($clave == "Fecha_fin") {
                $sql .= "'$valor','12345','Activo');";
                break;
            }
        }
        return $sql;
    }

}

new UsersDAO();
