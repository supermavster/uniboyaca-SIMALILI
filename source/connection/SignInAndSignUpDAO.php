<?php

class UsersDAO
{
    final public static function getMaxUsers()
    {
        return "SELECT max(`idUsuarios`) FROM `usuarios`";
    }

    final public static function getUsers()
    {
        return "SELECT `Documento_id` FROM `usuarios`";
    }

    final public static function getDataUserByID($id)
    {
        return "SELECT * FROM `usuarios` WHERE `Documento_id` = $id";
    }
}

new UsersDAO();
