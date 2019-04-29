<?php

/**
 * Check Login By Post (Android - Kotlin / Volley)
 */

// Add Library
require_once getPath() . 'isv/source/model/admin/config.php';
require_once getPath() . 'isv/source/plugins/isv/JsonHandler.php';
require_once getPath() . 'isv/source/connection/DataBase.php';
require_once getPath() . 'isv/source/connection/SignInAndSignUpDAO.php';
require_once 'class/signIn.php';

// Values Base
//Session
if (!isset($_SESSION)) {
    session_start();
}
define("isSession", isset($_SESSION));

define('LOGIN', constant('valuesLogin'));
require_once 'sessions.php';


// Start Connection
$connectionLogin = new DataBase('cittisco_users');
$signIn = new SignIn($connectionLogin);

// Close Connection
$connectionLogin->close();
unset($connectionLogin);
exit();

## Complement ##
function getPath($location = 1)
{
    $n = "";
    $pathFileTemp = "";
    $Chars = count_chars($_SERVER["PHP_SELF"], 1);
    foreach ($Chars as $Char => $nChars) {
        if ($Char == 47) {
            $n = $nChars;
            break;
        }
    }
    if ($n == 0) {
        $pathFileTemp = "";
    } else {
        $pathFileTemp = str_pad("", ($n - $location) * 3, "../");
    }
    return $pathFileTemp;
}

function showElements($arrayImages, $withWall = false)
{
    // Make and Show the JSON
    header('Content-Type: application/json');
    if ($withWall) {
        print("[" . JsonHandler::encode($arrayImages, JSON_PRETTY_PRINT) . "]");
    } else {
        print(JsonHandler::encode($arrayImages, JSON_PRETTY_PRINT));
    }

}

function makeElements($string, $checkUFT = true)
{
    return JsonHandler::decode($string, $checkUFT);
}