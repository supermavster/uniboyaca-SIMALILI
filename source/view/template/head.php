<?php
$head = new HTMLTag('head');
//Title
$title = new HTMLTag('title');
$title->innerHTML(TITLE_WEB);
$head->appendChild($title);

//Style
require_once 'styleWebHead.php';