<?php

/**
 * Complements Base - Web
 **/

# Get URL
function url_origin($s, $use_forwarded_host = false, $withoutParametes = true)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on');
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    $newUrl = ($withoutParametes) ? $protocol . "://" . $host . "/" : $host;
    return $newUrl;
}

function full_url($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host);
}

function full_url_with_Parameters($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

function full_url_without_Parameters($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host, false);
}

# Make JSON
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


# Get Content
function getContent($dir)
{
    $content = "";
    if (ob_get_contents()) {
        ob_end_clean();
    }

    // Start output buffer
    ob_start();
    // Attempt to include JavaScript frontend code
    if (!require_once($dir)) {
        ob_end_clean();
        $error = 'file "' . $dir . '" could not be included!';
        exit($error);
    }

    // Get output buffer contents and turn off output buffering
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

# Remove all Cookies
function removeCookie($key)
{
    if (isset($_COOKIE[$key])) {
        unset($_COOKIE[$key]);
        // empty value and old timestamp
        setcookie($key, '', time() - 3600, '/');
    }
}

function getRequest($key)
{
    if (empty ($_GET[$key]) and empty ($_POST[$key])) {
        return false;
    }
    // Attempt to obtain GET data
    if (!empty ($_GET[$key])) {
        $request = $_GET[$key];
    }
    // Attempt to obtain POST data
    if (!empty ($_POST[$key])) {
        $request = $_POST[$key];
    }
    // Strip escape slashes from POST or GET
    if (get_magic_quotes_gpc()) {
        $request = stripslashes($request);
    }
    return $request;
}