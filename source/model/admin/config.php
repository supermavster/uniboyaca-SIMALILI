<?php

/**
 * Config for all Web
 *
 * @package    Cittis
 * @copyright  2019 Cittis
 */

// Debug Project (Only Admin)
const debug = true;

#Config Main
const limitTime = 300;

#Names Main
const Title = 'Simalili';
const version = 'v 1.0.2';
const Slogan = 'SIMALILI automatiza toda la información, con el fin de ahorrar tiempos y recursos de gran manera';
const Description = Title . " Este es un sistema que apoyará el proceso de matrículas de estudiantes en la institución. Esto implica, que el sistema debe permitir la gestión de matrícula como tal y la gestión de la información relacionada con esta; es decir: la gestión de estudiantes, docentes, asignaturas, grados y/o cursos del Liceo Libre; también hará la gestión de reportes tales como: listas académicas y listado del cuerpo docente de la institución. " . PHP_EOL . PHP_EOL . "-" . Slogan . "-  ";
# Tags
const KeysWeb = "Software";

#Social
const YouTube = 'ID';
const idVideo = 'VIDEO_ID';
const Twitter = 'ID';
const Facebook = 'ID';
const GooglePlus = 'ID';
#Char Main
const charMain = 'UTF-8';

#Location - Time
const TimeZone = 'America/Bogota';
const GMT = "GMT-5";
const formatDate = 'Y-m-d H:i:s';

#Data Base
const DB_Host = 'localhost';
const DB_Name = 'db_simalili';
const DB_User = 'root';
const DB_Password = '';
const DB_Char = 'utf8';

#Login
const auth = "Autenticado";

#Extends / Pluggins -> Keys
const jqueryVersion = "3.3.1";

# Values Temp
const valuesLogin = array(
    //Header Header
    'SINGUP' => "Registrarse",
    'SINGIN' => "Ingresar",
    'FORUM' => "Nuestro Foro",
    'WHY-MAVS' => "Actualizaciones de Mavsters",
    //LOGIN SINGUP
    'LOGIN-TITLE' => "Ingresa tú cuenta",
    'LOGIN-SUBTITLE' => "Ingresa tú cuenta y disfruta del contenido, links y archivos exclusivos.",
    'LOGIN-USER' => "Usuario",
    'LOGIN-PASSWORD' => "Contraseña",
    'LOGIN-REMEMBER' => "Recordar mi Contraseña",
    'LOGIN-FORGET-PASSWORD' => "¿Olvidaste tú Contraseña? <a href='#forgetPassword' class='forgetPassword primary'>¡Clic aquí!</a>",
    'LOGIN-NOW' => "Ingresa <span class='primary'>Ahora</span>!",
    'LOGIN-FACEBOOK' => "Ingresa con Facebook",
    'LOGIN-TWITTER' => "Ingresa con Twitter",

    'SINGUP-TITLE' => "Crear una Cuenta",
    'SINGUP-SUBTITLE' => "¡Registrate ahora y disfruta de todo el contenido de Mavsters!",
    'SINGUP-EMAIL' => "Correo Electrónico",
    'SINGUP-SUBEMAIL' => "Ingresa tu Correo Electrónico aquí...",
    'SINGUP-USER' => "Usuario",
    'SINGUP-USER-TITLE' => "Ingresa tú Usuario aquí...",
    'SINGUP-PASSWORD' => "Contraseña",
    'SINGUP-PASSWORD-TITLE' => "Repetir Contraseña",
    'SINGUP-PASSWORD-REPEAT' => "Repite tú Contraseña aquí...",
    'SINGUP-NOW' => "¡Registrarse <span class='primary'>Ahora</span>!",

    //Login
    'LOGIN-ERRO-1' => "Debes ingresar información válida",
    'LOGIN-ERRO-2' => "Usuario Incorrecto",
    'LOGIN-ERRO-3' => "Contraseña Incorrecta",

    //Signup
    'SIGNUP-ERRO-1' => "Debes ingresar información válida",
    'SIGNUP-ERRO-2' => "Upss .. Este Ya existe email",
    'SIGNUP-ERRO-3' => 'Perdón, pero este usuario ya existe',
    'SIGNUP-ERRO-4' => "Las contraseñas no coinciden",
);