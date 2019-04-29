<?php
// Verification
if (basename($_SERVER['REQUEST_URI']) !== basename(__FILE__)) {

    class SignUp
    {

        private $userPOST;
        private $passPOST;
        private $emailPOST;
        private $repeatPassPOST;

        private $temp;
        private $temp2;

        private $userPOSTMinusculas;

        private $userBD;
        private $passwordBD;
        private $id;
        private $userName;

        private $langType;

        protected $connection;

        function __construct($connection)
        {
            $this->connection = $connection;
            $this->langType = LOGIN;
            self::checkData();
        }

        protected function checkData()
        {
            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
                self::initProcess();
            }
        }

        function initProcess()
        {
            exit($_POST["userCargo"]);
            /*userID
            userName
            userCargo
            userState
            passRegistro*/
            $this->setDates(
                $_POST["userRegistro"],
                $_POST["passRegistro"],
                $_POST["email_address"],
                $_POST["repeat_password"]
            );
            $this->filtre();
            $this->limit();
            $this->setDatesDB();
            $this->check();
        }

        function setDates($user, $pass, $email, $repeatemail)
        {
            //Obtenemos los datos del formulario de acceso
            $this->userPOST = $user;
            $this->passPOST = $pass;
            $this->emailPOST = $email;
            $this->repeatPassPOST = $repeatemail;
        }

        function filtre()
        {
            //Filtro anti-XSS
            $this->userPOST = htmlspecialchars((string)preg_replace('/\s+/', '', $this->userPOST));

            $this->passPOST = htmlspecialchars((string)$this->passPOST);
        }

        function limit()
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

        function setDatesDB()
        {
            //Obtenemos los resultados
            $datos = $this->getConnection()->db_exec("fetch_array", SignInAndSignUp::getUserInformation());
            //Chequeamos los valores
            $this->temp = 0;
            $this->temp2 = 0;
            for ($i = 0; $i < count($datos); $i++) {
                if (($this->userPOSTMinusculas == $datos[$i]['usernamelowercase'])) {
                    $this->temp = 1;
                    break;
                }
            }
            for ($i = 0; $i < count($datos); $i++) {
                if (($this->emailPOST == $datos[$i]['email'])) {
                    $this->temp2 = 1;
                    break;
                }
            }

            //Guardamos los resultados del nombre de usuario en minúsculas
            //y de la contraseña de la base de datos
            if (!nullOrEmptyString($datos)) {
                $this->userBD = $datos[0]['usernamelowercase'];
                $this->passwordBD = $datos[0]['password'];
                $this->id = $datos[0]["idUser"];
                $this->userName = $datos[0]["username"];
            }
            //print_r($datos);
        }

        function check()
        {
            //Comprobamos si los datos son correctos
            if (empty($this->userPOST) || empty($this->passPOST)) {
                echo $this->langType['SIGNUP-ERRO-1'];
            } else if ($this->temp2 === 1) {
                echo $this->langType['SIGNUP-ERRO-2'];

            } else if ($this->temp === 1) {
                echo $this->langType['SIGNUP-ERRO-3'];

            } else if ($this->repeatPassPOST != $this->passPOST) {
                echo $this->langType['SIGNUP-ERRO-4'];

            } else {
                $this->signUpNewUser();
            }
            unset($this->connection);
        }

        function aleatoriedad()
        {
            $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
            $nueva_clave = "";
            for ($i = 5; $i < 35; $i++) {
                $nueva_clave .= $caracteres[rand(5, 35)];
            };
            return $nueva_clave;
        }

        function signUpNewUser()
        {

            $aleatorio = $this->aleatoriedad();
            $valor = "07";
            $salt = "$2y$" . $valor . "$" . $aleatorio . "$";

            $passwordConSalt = crypt($this->passPOST, $salt);

            $valTemps = array(
                "code" => $aleatorio,
                "img" => 'anonymous.png',
                "user" => $this->userPOST,
                "userMinus" => $this->userPOSTMinusculas,
                "password" => $passwordConSalt,
                "email" => $this->emailPOST,
            );
            $valuesTemp = "";
            foreach ($valTemps as $key => $value) {
                $valuesTemp .= $value;
            }
            $activation = md5($valuesTemp . time()); // encrypted email+timestamp

            $valuesUser[] = array(
                "code" => $activation,
                "img" => 'anonymous.png',
                "user" => $this->userPOST,
                "userMinus" => $this->userPOSTMinusculas,
                "password" => $passwordConSalt,
                "email" => $this->emailPOST,
            );

            self::getConnection()->db_exec('query', 'SET FOREIGN_KEY_CHECKS=0;');
            //Email
            $check = self::getConnection()->db_exec("num_rows", SignInAndSignUp::getEmailInformationByEmail($this->emailPOST));
            $condition = ($check < 1) ? "INSERT" : "REPLACE";
            $idEmail = self::getConnection()->db_exec("fetch_row", SignInAndSignUp::getMaxIDFromEmails())[0];
            self::getConnection()->db_exec("query", SignInAndSignUp::addEmail($condition, $idEmail, $this->emailPOST));
            //ID
            $ids = self::getConnection()->db_exec("fetch_row", SignInAndSignUp::getIDEmailByEmail($this->emailPOST));

            //Armamos la consulta para introducir los datos
            $idUser = self::getConnection()->db_exec("fetch_row", SignInAndSignUp::getMaxUsers())[0];
            self::getConnection()->db_exec("query", SignInAndSignUp::insertUser($idUser, $this->userPOST, $this->userPOSTMinusculas, $passwordConSalt, $ids[0], $activation));

            //Send Mails require_once  AS_COMPLEMENTS."Mail.php";$sub = new Subscribe();$sub->sendMails(1, $this->emailPOST, $valuesUser);

            self::getConnection()->db_exec('query', 'SET FOREIGN_KEY_CHECKS=1;');
            exit("Complete");

        }

        function getConnection()
        {
            return $this->connection;
        }

    }
}
