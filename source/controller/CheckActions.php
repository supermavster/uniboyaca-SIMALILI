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
            case "user":
                self::user();
                break;
            case "docent":
                self::docent();
                break;
            case "enrollment":
                self::insertStudent();
                break;
            case "grade":
                self::grade();
                break;
            case "subject":
                self::subject();
                break;
        }
    }

    /** User */
    protected function user()
    {
        //`idPerson`, `firstName`, `lastName`, `TypeDocument`, `NumberDocument`, `birthday`, `rh`,`eps`, `religion`, `phone`
        switch (getRequest("user")) {
            case "new":
                self::insertUser();
                break;
            case "modify":
                if (!isset($_POST['idMain'])) {
                    self::modifyUser();
                }
                break;
            case "delete":
                self::deleteUser();
                break;
        }
    }

    protected function getDataPostUser()
    {
        // Add Docent
        $data = $_POST;
        /**
         * {
         * "name": "",
         * "lastName": "",
         * "typeID": "Seleccione...",
         * "numberID": "",
         * "birthday": "06\/20\/2018",
         * "rh": "Seleccione...",
         * "religion": "",
         * "numberPhone": "",
         * "position": "Seleccione...",
         * "initDate": "06\/20\/2018",
         * "endDate": "06\/20\/2018",
         *   'checkEnable' => 'on',
         * "ciberusuario": "",
         * "password": ""
         * }
         */
        $initDate = date("Y-m-d", strtotime($data['initDate']));
        $endDate = date("Y-m-d", strtotime($data['endDate']));
        $birthday = date("Y-m-d", strtotime($data['birthday']));
        $checkEnable = (isset($data['checkEnable'])) ? 1 : 0;
        // Show the max users registers
        $idPerson = $this->connection->db_exec("value", PersonDAO::getMaxID()) + 1;
        $id = self::getConnection()->db_exec("value", PersonDAO::getID($data['ciberusuario']));
        $values =
            array(
                'source' => $this->path,
                'id' => $id,
                'idPerson' => $idPerson,
                'person' => array(
                    'firstName' => $data['name'],
                    'lastName' => $data['lastName'],
                    'TypeDocument' => $data['typeID'],
                    'NumberDocument' => $data['numberID'],
                    'birthday' => $birthday,
                    'rh' => $data['rh'],
                    'eps' => $data['eps'],
                    'religion' => $data['religion'],
                    'phone' => $data['numberPhone'],
                ),
                'institutionalcharge' => array(
                    'position' => $data['position'],
                    'initDate' => $initDate,
                    'endDate' => $endDate,
                    'enable' => $checkEnable,
                ),
                'user' => array(
                    'ciberusuario' => $data['ciberusuario'],
                    'password' => $data['password']
                )
            );
        return $values;
    }

    protected function insertUser()
    {
        $values = self::getDataPostUser();
        //showContent($values);
        // Add Grade
        if (!$this->connection->db_exec("query", PersonDAO::addPerson($values))) {
            if (!$this->connection->db_exec("query", InstitutionalChargeDAO::addInstitutionalCharge($values))) {
                if (!$this->connection->db_exec("query", UsersDAO::addUser($values))) {
                    self::addAndExit();
                }
            }
        }
    }

    protected function modifyUser()
    {
        $values = self::getDataPostUser();
        // Modify Grade
        if (!self::getConnection()->db_exec("query", PersonDAO::updatePerson($values))) {
            if (!self::getConnection()->db_exec("query", InstitutionalChargeDAO::updateInstitutionalCharge($values))) {
                if (!self::getConnection()->db_exec('query', UsersDAO::updateUser($values))) {
                    self::addAndExit("Modificado");
                }
            }
        }
        //showContent($values);
    }

    protected function deleteUser()
    {
        // Delete Grade
        if (!$this->connection->db_exec("query", GradeDAO::deleteName($_POST['idGrade']))) {
            self::addAndExit("Eliminado");
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

    /** Subject */
    protected function subject()
    {
        switch (getRequest("subject")) {
            case "new":
                self::insertSubject();
                break;
            case "modify":
                self::modifySubject();
                break;
            case "delete":
                self::deleteSubject();
                break;
        }
    }

    protected function insertSubject()
    {
        $dataTemp = $_POST;
        $data = array(
            "Cod_Asignatur" => $dataTemp['codeSubject'],
            "Nombre_asignatura" => $dataTemp['nameSubject'],
            "Estado" => "Activa",
            "Asignatura_curso_idAsignatura_curso" => 1,
            "Asignatura_curso_Curso_id_curso" => 1,
            "Asignatura_curso_Curso_Grado_id_Grado" => 1,
            "Docente_idDocente" => $dataTemp['nameDocent'],
            "Docente_idDocente1" => $dataTemp['nameDocent'],
            "Grado_id_Grado" => $dataTemp['idGrade'],
        );
        // Add Subject
        if (!$this->connection->db_exec("query", SubjectDAO::addSubject($data))) {
            self::addAndExit();
        }
    }

    protected function modifySubject()
    {
        // Modify Grade
        if (!$this->connection->db_exec("query", GradeDAO::updateName($_POST['idGrade'], $_POST['idNewGrade']))) {
            self::addAndExit("Modificados");
        }
    }

    protected function deleteSubject()
    {
        // Delete Grade
        if (!$this->connection->db_exec("query", GradeDAO::deleteName($_POST['idGrade']))) {
            self::addAndExit("Eliminado");
        }
    }


    /** Docent **/
    protected function docent()
    {
        switch (getRequest("docent")) {
            case "new":
                self::insertDocent();
                break;
            case "modify":
                self::modifyDocent();
                break;
            case "delete":
                self::deleteDocent();
                break;
        }
    }

    protected function insertDocent()
    {
        // Add Docent
        $data = $_POST;
        $registerDate = date("Y-m-d", strtotime($data['registerDate']));
        $endDate = date("Y-m-d", strtotime($data['endDate']));
        // Show the max users registers
        $maxUsers = $this->connection->db_exec("value", UsersDAO::getMaxUser()) + 1;

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
            "Usuarios_idUsuarios" => $maxUsers
        );

        // Add User
        if (!$this->connection->db_exec("query", UsersDAO::addUser($maxUsers, $values))) {
            // Add Docent
            if (!$this->connection->db_exec("query", DocentDAO::addDocent($maxUsers, $values))) {
                self::addAndExit();
            }
        }
    }

    protected function modifyDocent()
    {
        // Add Docent
        $data = $_POST;
        if (!isset($data['fullName'])) {
            $registerDate = date("Y-m-d", strtotime($data['registerDate']));
            $endDate = date("Y-m-d", strtotime($data['endDate']));
            // Show the max users registers
            $maxUsers = $this->connection->db_exec("value", UsersDAO::getMaxUser()) + 1;

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
                "Usuarios_idUsuarios" => $maxUsers
            );

            // Modify Docent
            if (!$this->connection->db_exec("query", DocentDAO::updateDocent($values))) {
                self::addAndExit("Modificados");
            }
        }
    }


    protected function deleteDocent()
    {
        // Delete Docent
        if (!$this->connection->db_exec("query", DocentDAO::deleteName($_POST['fullName']))) {
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
        //showContent($data);
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


    private function addAndExit($txt = "Añadidos")
    {
        $this->connection->close();
        echo("<script>alert('Datos $txt con Exito');window.open('" . getActualURL() . "', '_self');    </script>");
    }

    private function exitAll($message)
    {
        exit ('<b>' . str_replace(".php", "", basename($_SERVER['PHP_SELF'])) . '</b>: ' . $message);
    }

    protected function getConnection()
    {
        return $this->connection;
    }
}


if (!isset($user)) {
    $user = new CheckActions($connection, $path);
}