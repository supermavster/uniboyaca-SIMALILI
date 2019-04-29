<?php

/**
 * Settings for all Web
 */

class Settings
{
    // Global Variables
    private $connection;
    private $connectionLogin;

    public function __construct()
    {
        $this->connection = null;
        $this->connectionLogin = null;

        $this->init();
    }

    protected function init()
    {
        self::setConstants();
        self::setSettings();
        self::setDataBase();
        self::setLogin();
        self::setURL();
    }

    protected function setConstants()
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . realpath('./'));
        //Main folders
        define('AS_ROOT', getPath());
        define('AS_SRC', AS_ROOT . 'source/');
        //Model View Control
        define('AS_MODEL', AS_SRC . 'model/');
        define('AS_VIEW', AS_SRC . 'view/');
        define('AS_CONTROL', AS_SRC . 'controller/');
        define('AS_DB', AS_SRC . 'connection/');
        define('AS_PLUGINS', AS_SRC . 'plugins/');
        //Admin Data
        define('AS_ADMIN', AS_MODEL . 'admin/');
        //Template
        define('AS_TEMPLATE', AS_VIEW . 'template/');
        define('AS_WWWROOT', AS_SRC . 'wwwroot/');
        define('AS_ASSETS', AS_WWWROOT . 'assets/');
        define('AS_IMAGES', AS_WWWROOT . 'images/');
        define('AS_COMPLEMENTS', AS_PLUGINS . 'complements/');
    }

    protected function setSettings()
    {
        //Admin Library
        require_once AS_ADMIN . 'config.php';
        require_once AS_MODEL . 'complements.php';
        require_once AS_COMPLEMENTS . 'HtmlTag.php';
        require_once AS_COMPLEMENTS . 'JSMinifier.php';
        require_once AS_COMPLEMENTS . 'JsonHandler.php';


        // Límite de ejecución
        set_time_limit(constant("limitTime"));

        //Description Web
        define('TITLE_WEB', constant('Title'));
        define('SLOGAN_WEB', constant('Slogan'));
        define('DESCRIPTION_WEB', constant('Description'));
        // Type Icon
        define('THEME_ICON', 'far');
    }

    protected function setLogin()
    {
        //Session
        if (!isset($_SESSION)) {
            session_start();
        }
        define("isSession", isset($_SESSION));

        define('LOGIN', constant('valuesLogin'));
        require_once AS_PLUGINS . 'login/sessions.php';

        require_once AS_PLUGINS . 'login/class/signIn.php';
        $signIn = new SignIn(self::getDataBase());
    }

    protected function setURL()
    {
        //Url Web
        define('URLWEB_FULL', full_url($_SERVER));
        define('URLWEB', full_url_without_Parameters($_SERVER));
    }

    /**
     * Get Methods
     */

    public function finish()
    {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    public function getDataBase()
    {
        return $this->connection;
    }


    protected function setDataBase()
    {
        //Data Base
        require_once AS_DB . 'DataBase.php';
        $this->connection = new DataBase();
        if ($this->connection != null) {
            define("CH_DB", ($this->connection->getDB()) ? "Yes" : "No");
            //DB System
            if (CH_DB === 'Yes') {
                self::includeDAOS();
            } else {
                exit("No connect to DB");
            }
        } else {
            exit("No connect to DB");
        }
    }

    protected function includeDAOS()
    {
        require_once AS_DB . 'SignInAndSignUpDAO.php';
    }
}

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
