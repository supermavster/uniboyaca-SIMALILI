<?php


class CheckActions
{

    public $path = "";
    protected $connection;

    public function __construct($connection, $path)
    {
        $this->path = $path;
        $this->connection = $connection;
        self::checkProcess();
    }

    protected function checkProcess()
    {
        if (basename($_SERVER['PHP_SELF']) !== basename(__FILE__)) {
            if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
                if (isset($_POST) && !empty($_POST)) {
                    self::initProcess();
                } else {
                    self::exitAll("No ha ingresado datos");
                }
            } else {
                self::exitAll("NO es un método POST, lo que solicito");
            }
        } else {
            self::exitAll("El archivo no puede ser solicitado");
        }
    }

    protected function initProcess()
    {
        // Init Process
        self::getData();
    }

    protected function getData()
    {
        switch ($this->path) {
            case "docent":
                self::insertDocent();
                break;
        }


        //

        /*        $data =
            array (
                'name' => 'a',
                'lastName' => 'v',
                'typeID' => 'Cedula',
                'numberID' => '1',
                'birthday' => '06/25/2018',
                'birthplace' => 'q',
                'years' => '20',
                'profesion' => 'a',
                'position' => 'Directivo',
                'ciberusuario' => '3',
                'password' => '1',
                'password2' => '1',
            );
*/
    }


    /** DOCENT **/
    protected function insertDocent()
    {
        $data = $_POST;

        $registerDate = date("Y-m-d", strtotime($data['registerDate']));
        $endDate = date("Y-m-d", strtotime($data['endDate']));

        $values = array(
            "Nombre_Completo" => $data['name'] . " " . $data['lastName'],
            "Lugar_nacimiento" => $data['birthplace'],
            "Fecha_Nacimiento" => $data['birthday'],
            "Edad" => $data['years'],
            "Religion" => $data['religion'],
            "Titulo_profesional" => $data['profession'],
            "Titulo_documento" => $data['typeID'],
            "Num_id" => $data['numberID'],
            "Fecha_Registro" => $registerDate,
            "Fecha_fin" => $endDate,
            "Estado" => $data['eps'],
            "Usuarios_idUsuarios" => $data['birthplace']
        );
        // Show the max users registers
        $maxUsers = $this->connection->db_exec("value", UsersDAO::getMaxUser()) + 1;

        // Add User
        if (!$this->connection->db_exec("query", UsersDAO::addUser($maxUsers, $values))) {
            // Add Docent
            if (!$this->connection->db_exec("query", DocentDAO::addDocent($maxUsers, $values))) {
                $this->connection->close();
                echo("<script>alert('Datos Añadidos con Exito');window.open('" . getActualURL() . "', '_self');    </script>");
            }
        }


    }

    private function exitAll($message)
    {
        exit ('<b>' . str_replace(".php", "", basename($_SERVER['PHP_SELF'])) . '</b>: ' . $message);
    }
}


if (!isset($user)) {
    $user = new CheckActions($connection, $path);
}