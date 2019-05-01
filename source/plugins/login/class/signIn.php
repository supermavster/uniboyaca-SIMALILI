<?php
// Verification - Security
if (basename($_SERVER['REQUEST_URI']) !== basename(__FILE__)) {

    class SignIn
    {

        private $response = array();
        // Variables Globals

        private $userPOST;
        private $passPOST;

        private $userPOSTMinusculas;

        private $userBD;
        private $passwordBD;
        private $id;
        private $userName;

        private $langType;

        protected $connection;
        protected $cookie;

        function __construct($connection)
        {
            $this->connection = $connection;
            $this->langType = LOGIN;
            $this->cookie = $_COOKIE;
            self::checkData();
        }

        protected function checkData()
        {
            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
                self::initProcess();
            }
            # Define Login    
            $checkUser = false;
            if (isSession) {
                $checkDataUser = isset($_SESSION['user']);
                $checkDataState = isset($_SESSION['state']) && ($_SESSION['state'] === constant("auth"));
                $checkUser = ($checkDataUser === true) && ($checkDataState === true);
            }
            if (constant("debug")) {
                $checkUser = constant("debug");
            }
            define('isLogin', $checkUser);
        }

        protected function initProcess()
        {
            self::setDates();
            if ((isset($this->userPOST) && isset($this->passPOST)) && ($this->userPOST != null && $this->passPOST != null)) {
                self::filtre();
                self::limit();
                self::setDatesDB();
                self::check();
            }
        }

        function setDates()
        {
            $user = isset($_POST["userAccess"]) ? $_POST["userAccess"] : null;
            $pass = isset($_POST["passAccess"]) ? $_POST["passAccess"] : null;

            if (isset($_COOKIE['COOKIE_INDEFINED_SESSION']) && ($_COOKIE['COOKIE_INDEFINED_SESSION'] == true)) {
                $user = $_COOKIE['COOKIE_DATA_INDEFINED_SESSION']['nombre'];
                $pass = $_COOKIE['COOKIE_DATA_INDEFINED_SESSION']['password'];
            }
            //Obtenemos los datos del formulario de acceso
            $this->userPOST = $user;
            $this->passPOST = $pass;
            $this->rememberPOST = 'on';
        }

        protected function filtre()
        {
            //Filtro anti-XSS
            $this->userPOST = htmlspecialchars((string)$this->userPOST);
            $this->passPOST = htmlspecialchars((string)$this->passPOST);
        }

        protected function limit()
        {
            //Definimos la cantidad máxima de caracteres
            //Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
            //Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
            $maxCaracteresUsername = "20";
            $maxCaracteresPassword = "60";

            //Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
            if (strlen($this->userPOST) > $maxCaracteresUsername) {
                die('El nombre de usuario no puede superar los ' . $maxCaracteresUsername . ' caracteres');
            };

            if (strlen($this->passPOST) > $maxCaracteresPassword) {
                die('La contraseña no puede superar los ' . $maxCaracteresPassword . ' caracteres');
            };

            //Pasamos el input del usuario a minúsculas para compararlo después con
            //el campo "usernamelowercase" de la base de datos
            $this->userPOSTMinusculas = strtolower($this->userPOST);
        }

        protected function setDatesDB()
        {
            //Obtenemos los resultados
            $datos = self::getConnection()->db_exec("fetch_array", SignInAndSignUp::getDataUserByID($this->userPOSTMinusculas));
            //Guardamos los resultados del nombre de usuario en minúsculas
            //y de la contraseña de la base de datos
            if (isset($datos)) {
                $this->userBD = $datos[0]['usernamelowercase'];
                $this->passwordBD = $datos[0]['password'];
                $this->id = $datos[0]["idUser"];
                $this->userName = $datos[0]["username"];
                //echo $this->passPOST . ", " . $this->passwordBD;
            } else {
                print_r($datos);
            }

        }

        protected function check()
        {
            //Mensaje
            $message = "";
            $this->response['error'] = true;
            //Comprobamos si los datos son correctos
            if (empty($this->userPOST) || empty($this->passPOST)) {
                //Vacio
                $message = $this->langType['LOGIN-ERRO-1'];
            } else if ($this->userBD != $this->userPOSTMinusculas) {
                //Usuario Incorrecto
                $message = $this->langType['LOGIN-ERRO-2'];
            } else if (!password_verify($this->passPOST, $this->passwordBD)) {
                //Clave  Incorrecta
                $message = $this->langType['LOGIN-ERRO-3'];
            } else if ($this->userBD == $this->userPOSTMinusculas and password_verify($this->passPOST, $this->passwordBD)) {
                //COmpleto
                $this->loginUser();
                // Complete
                $this->response['error'] = false;
                $message = "Complete";
            } else {
                //Error - NO existe
                $message = ('Error');
            }

            $this->response['message'] = $message;

            /**
             * {
             * "success": 1,
             * "response": {
             * "userId": 2,
             * "firstName": "Peter",
             * "lastName": "Nille",
             * "age": 28
             * }
             * }
             *
             */
            $showElements = array(
                "success" => (!$this->response['error']) ? 1 : 0,
                "response" => array(
                    "userId" => $this->id,
                    "userDB" => $this->userBD,
                    "passDB" => $this->passwordBD,
                    "message" => $message,
                )
            );
            showElements($showElements);
        }

        protected function loginUser()
        {
            mt_srand(time());
            $rand = mt_rand(1000000, 9999999);
            setcookie("COOKIE_INDEFINED_SESSION", true, $rand, "/");
            setcookie("COOKIE_DATA_INDEFINED_SESSION[nombre]", $this->userName, $rand, "/");
            setcookie("COOKIE_DATA_INDEFINED_SESSION[password]", $this->passwordBD, $rand, "/");
            setcookie("marca", true, $rand, "/");
            $_SESSION['marca'] = $rand;
            /* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */
            $name = self::getConnection()->db_exec("fetch_row", SignInAndSignUp::getNameByUser($this->userName))[0];
            $_SESSION['name'] = $name;
            $_SESSION['user'] = $this->userName;
            $_SESSION['state'] = 'Autenticado';
            //Si los datos no son correctos, o están vacíos, muestra un error
            //Además, hay un script que vacía los campos con la clase "acceso" (formulario)
        }

        public function exit()
        {
            self::getConnection()->db_exec("query", SignInAndSignUp::updateCookieByUserName(0, $_SESSION['user']));
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
        }

        protected function getConnection()
        {
            return $this->connection;
        }

    }
}
