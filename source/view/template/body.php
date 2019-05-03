<?php
$body = new HTMLTag('body');
$body->setComment(true);
require_once 'header.php';
$main = new HTMLTag('main');
// Check if is Login
if (!isLogin) {
    $section = new HTMLTag('section', array("class" => "section section-shaped section-lg"));
    $section->innerHTML('<div class="shape shape-style-1 bg-gradient-default"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>');
    if (isset($_GET) && isset($_GET["signUp"])) {
        require_once AS_VIEW . 'login/register.php';
    } else {
        require_once AS_VIEW . 'login/login.php';
    }
} else {
    $main->appendAttribute("class", "profile-page");
    $section = new HTMLTag('section', array("class" => "section"));
    // Default Values
    $file = "executive"; // Change by Session (secretary)
    $path = "login";
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

            case getRequest("login"):
                $path = "login";
                break;
        }
    }

    // Get File
    if (isset($file) && empty($file)) {
        $main->innerHTML('<section class="section-profile-cover section-shaped my-0" style="height: 440px">
      <!-- Circles background -->
      <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>');
        $file = getRequest($path);

    } else {
        $main->appendInnerHTML('<div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="display-3  text-white">Bienvenido
                                <span>' . (($file == 'secretary') ? "Secretaría" : "Directivo") . '</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>');
    }

    /** Init Process - Users */
    if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        require_once 'source/controller/CheckActions.php';
    }

    /** Call Require **/
    $path = "$path/$path-$file.php";
    require_once AS_VIEW . $path;
}
$main->appendChild($section);
$body->appendChild($main);
// Elements Base (END)
require_once 'complements.php';