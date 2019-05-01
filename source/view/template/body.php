<?php
$body = new HTMLTag('body');
$body->setComment(true);
require_once 'header.php';
$main = new HTMLTag('main');
$section = new HTMLTag('section', array("class" => "section section-shaped section-lg"));
$section->innerHTML('<div class="shape shape-style-1 bg-gradient-default"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>');
// Check if is Login
if (isLogin) {
    if (isset($_GET) && isset($_GET["signUp"])) {
        require_once AS_VIEW . 'login/register.php';
    } else {
        require_once AS_VIEW . 'login/login.php';
    }
} else {
    // Switch - Select Process
    if (isset($_GET) && !empty($_GET)) {
        $path = "";
        $file = "";
        switch (true) {
            case getRequest("docent"):
                $path = "docent";
                break;
            case getRequest("enrollment"):
                $path = "enrollment";
                break;
            case getRequest("executive"):
                $path = "executive";
                break;
            case getRequest("grade"):
                $path = "grade";
                break;
            case getRequest("list"):
                $path = "list";
                break;
            case getRequest("subject"):
                $path = "subject";
                break;
            case getRequest("user"):
                $path = "user";
                break;
            case getRequest("secretary"):
                $path = "secretary";
                break;

        }
        // Get File
        $file = getRequest($path);
        // Call Require
        $path = "$path/$path-$file.php";
        require_once AS_VIEW . $path;
    }
}
$main->appendChild($section);
$body->appendChild($main);
// Elements Base (END)
require_once 'complements.php';