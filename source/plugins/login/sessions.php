<?php

// Obtenemos el timestamp del servidor de cuanto se hizo la petición
$hora = $_SERVER["REQUEST_TIME"];

// Definimos la duración de la sesión en segundos
if (isset($_COOKIE) && isset($_COOKIE["marca"])) {
    $duracion = $_COOKIE["marca"];
} elseif (isset($_SESSION['marca'])) {
    $duracion = $_SESSION['marca'];
} else {
    $duracion = 60;
}

//Si el tiempo de la petición* es mayor al tiempo permitido de la duración, destruye la sesión y crea una nueva
if (isset($_SESSION['ultima_actividad']) && (($hora - $_SESSION['ultima_actividad']) > $duracion)) {
    session_unset();
    session_destroy();
    session_start();
}

// * Por esto este archivo debe ser incluido en cada página que necesite comprobar las sesiones

// Definimos el valor de la sesión "ultima_actividad" como el timestamp del servidor
$_SESSION['ultima_actividad'] = $hora;

# Define Login
$checkUser = false;
if (isSession) {
    $checkDataUser = isset($_SESSION['user']) and !empty($_SESSION['user']);
    $checkDataState = isset($_SESSION['state']) and !empty($_SESSION['state']) && ($_SESSION['state'] === constant("auth"));
    $checkUser = ($checkDataUser === true) && ($checkDataState === true);
}
if (constant("debug")) {
    $checkUser = constant("debug");
}
define('isLogin', $checkUser);