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
            case "enrollment":
                self::insertStudent();
                break;
            case "grade":
                self::grade();
                break;
        }
    }


    /** Grade */
    protected function grade()
    {
        switch (getRequest("grade")) {
            case "new":
                self::insertGrade();
                break;
            case "modify":
                self::modifyGrade();
                break;
            case "delete":
                self::deleteGrade();
                break;
        }
    }

    protected function insertGrade()
    {
        // Add Grade
        if (!$this->connection->db_exec("query", GradeDAO::addGrade($_POST['idGrade']))) {
            self::addAndExit();
        }
    }

    protected function modifyGrade()
    {
        // Modify Grade
        if (!$this->connection->db_exec("query", GradeDAO::updateName($_POST['idGrade'], $_POST['idNewGrade']))) {
            self::addAndExit("Modificados");
        }
    }

    protected function deleteGrade()
    {
        // Delete Grade
        if (!$this->connection->db_exec("query", GradeDAO::deleteName($_POST['idGrade']))) {
            self::addAndExit("Eliminado");
        }
    }


    /** Student */
    protected function insertStudent()
    {
//        `Nombre_Completo`, `Lugar_nacimiento`, `Fecha_nac`, `Edad`, `Religion`, `Nombre_tutor`, `Tipo_estudiante`, `Codigo_estudiante`, `Num_ID`

        $data = $_POST;

        $values =
            array(
                'name' => '',
                'lastName' => '',
                'typeID' => 'Seleccione...',
                'numberID' => '',
                'birthday' => '06/20/2018',
                'birthplace' => '',
                'years' => 'Seleccione...',
                'rh' => 'Seleccione...',
                'eps' => '',
                'nameFather' => '',
                'ccFather' => '',
                'phoneFather' => '',
                'nameMother' => '',
                'ccMother' => '',
                'phoneMother' => '',
                'nameAttendant' => '',
                'phoneAttendant' => '',
                'relationship' => '',
                'address' => '',
                'grade' => '',
                'religion' => '',
                'institute' => '',
            );

        // Data Values Main
        $values = array(

            "Nombre_Completo" => $data['name'] . " " . $data['lastName'],
            "Lugar_nacimiento" => $data['birthplace'],
            "Fecha_nac" => $data['birthday'],
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
        showContent($data);
        /*$registerDate = date("Y-m-d", strtotime($data['registerDate']));
        $endDate = date("Y-m-d", strtotime($data['endDate']));




        // Show the max users registers
        $maxUsers = $this->connection->db_exec("value", UsersDAO::getMaxUser()) + 1;

        // Add User
        if (!$this->connection->db_exec("query", UsersDAO::addUser($maxUsers, $values))) {
            // Add Docent
            if (!$this->connection->db_exec("query", DocentDAO::addDocent($maxUsers, $values))) {
                $this->connection->close();
                echo("<script>alert('Datos Añadidos con Exito');window.open('" . getActualURL() . "', '_self');    </script>");
            }
        }*/
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
                self::addAndExit();
            }
        }


    }

    private function addAndExit($txt = "Añadidos")
    {
        $this->connection->close();
        echo("<script>alert('Datos $txt con Exito');window.open('" . getActualURL() . "', '_self');    </script>");
    }

    private function exitAll($message)
    {
        exit ('<b>' . str_replace(".php", "", basename($_SERVER['PHP_SELF'])) . '</b>: ' . $message);
    }
}


if (!isset($user)) {
    $user = new CheckActions($connection, $path);
}