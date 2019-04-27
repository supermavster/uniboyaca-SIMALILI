<?php
$body = new HTMLTag('body');
$body->setComment(true);
require_once 'header.php';
$main = new HTMLTag('main');
$section = new HTMLTag('section', array("class" => "section section-shaped section-lg"));
$section->innerHTML('<div class="shape shape-style-1 bg-gradient-default"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>');
// Check if is Login
if (isLogin) {
    require_once AS_VIEW . 'login/login.php';
} else {
    //require_once (AS_PLUGINS.'login/base/form.php');
}
$main->appendChild($section);
$body->appendChild($main);
// Elements Base (END)
require_once 'complements.php';