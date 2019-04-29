<?php

// Add All Components
if (isset($_GET) && isset($_GET['checkSession'])) {
    // SigIn o SignUp
    require_once $_GET['checkSession'] . '.php';
} else {
    require_once 'signIn.php';
}