<?php

/**
 * Exit and Close - Session
 *
 * @package    ISV - IVS
 * @author     Original Author - Cittis
 * @copyright  2019 Cittis
 * Copyright (C) 2019 Cittis
 */
# Remove all Cookies
function removeCookie($key)
{
    if (isset($_COOKIE[$key])) {
        unset($_COOKIE[$key]);
        // empty value and old timestamp
        setcookie($key, '', time() - 3600, '/');
    }
}

// Remove Cookies
removeCookie("COOKIE_INDEFINED_SESSION");
removeCookie("COOKIE_DATA_INDEFINED_SESSION[nombre]");
removeCookie("COOKIE_DATA_INDEFINED_SESSION[password]");
// Remove Session
unset($_SESSION);
session_unset();
session_destroy();
session_start();
// Return Home
header("Location: /");
die();
?>