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
                if (!isset($_POST['idMain']))
                    self::modifyUser();
                break;
            case "delete":
                if (!isset($_POST['idMain']))
                    self::deleteUser();
                break;
        }
    }

    protected function getDataPostUser()
    {
        // Add Docent
        $data = $_POST;
        // Set Data
        $initDate = date("Y-m-d", strtotime($data['initDate']));
        $endDate = date("Y-m-d", strtotime($data['endDate']));
        $birthday = date("Y-m-d", strtotime($data['birthday']));
        $checkEnable = (isset($data['checkEnable'])) ? 1 : 0;
        // Show the max users registers
        $idPerson = $this->connection->db_exec("value", PersonDAO::getMaxID()) + 1;

        $id = "";
        switch ($this->path) {
            case "user":
                $id = self::getConnection()->db_exec("value", PersonDAO::getID($data['ciberusuario']));
                break;
            case "docent":
                $id = self::getConnection()->db_exec("value", PersonDAO::getIDByNumberDocument($data['numberID']));
                break;
        }


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
                ),
                'docent' => array(
                    'jobTitle' => $data['jobTitle'],
                    'initDate' => $initDate,
                    'endDate' => $endDate,
                    'enable' => $checkEnable
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
        $values = self::getDataPostUser();
        // Modify Grade
        if (!self::getConnection()->db_exec('query', UsersDAO::deleteUser($values))) {
            if (!self::getConnection()->db_exec("query", InstitutionalChargeDAO::deleteInstitutionalCharge($values))) {
                if (!self::getConnection()->db_exec("query", PersonDAO::deletePerson($values))) {
                    self::addAndExit("Eliminado");
                }
            }
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
        //{ "idGrade": "a", "numberCourses": "2", "selectCourse": "a1", "selectDocent": "3" }
        self::getConnection()->db_exec("query", GradeDAO::addGrade($_POST['idGrade']));

        $idGrade = self::getConnection()->db_exec("value", GradeDAO::getIDGradeByName($_POST['idGrade']));
        $idDocent = self::getConnection()->db_exec("value", DocentDAO::getIDDocentByID($_POST['selectDocent']));
        if (isset($idGrade) && !empty($idDocent)) {
            $name = $_POST['selectCourse'];
            if (!self::getConnection()->db_exec("query", GradeDAO::addCourses($name, $idGrade, $idDocent))) {
                self::addAndExit();
            }
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
                $idCourse = self::getConnection()->db_exec("value", GradeDAO::getIDGradeByName($_POST['idCourse']));

        $data = array(
            "idSubject" => $dataTemp['codeSubject'],
            "nameSubject" => $dataTemp['nameSubject'],
            "idDocent" => $dataTemp['idDocent'],
            "idCourse" => $idCourse,
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
                if (!isset($_POST['idMain']))
                    self::modifyDocent();
                break;
            case "delete":
                if (!isset($_POST['idMain']))
                    self::deleteDocent();
                break;
        }
    }

    protected function insertDocent()
    {

        $values = self::getDataPostUser();
        //showContent($values);
        // Add Docent
        if (!$this->connection->db_exec("query", PersonDAO::addPerson($values))) {
            if (!$this->connection->db_exec("query", DocentDAO::addDocent($values))) {
                self::addAndExit();
            }
        }
    }

    protected function modifyDocent()
    {
        $values = self::getDataPostUser();
        // Modify Grade
        if (!self::getConnection()->db_exec("query", PersonDAO::updatePerson($values))) {
            if (!self::getConnection()->db_exec("query", DocentDAO::updateDocent($values))) {
                self::addAndExit("Modificado");

            }
        }
        //showContent($values);

    }


    protected function deleteDocent()
    {
        // Delete Docent
        $values = self::getDataPostUser();
        // Modify Grade
        if (!$this->connection->db_exec("query", DocentDAO::deleteDocent($values))) {
            if (!self::getConnection()->db_exec("query", PersonDAO::deletePerson($values))) {
                self::addAndExit("Eliminado");
            }
        }
    }

    /** Student */
    protected function insertStudent()
    {
//        `Nombre_Completo`, `Lugar_nacimiento`, `Fecha_nac`, `Edad`, `Religion`, `Nombre_tutor`, `Tipo_estudiante`, `Codigo_estudiante`, `Num_ID`

        $data = $_POST;

$value =
    array (
        'typeEnrollment' => 'Seleccione...',
        'name' => '',
        'lastName' => '',
        'typeID' => 'Seleccione...',
        'numberID' => '',
        'birthday' => '05/15/2019',
        'rh' => 'Seleccione...',
        'eps' => '',
        'religion' => '',
        'numberPhone' => '',
        'codeStudent' => '',
        'placebirth' => '',
        'typeStudent' => 'Seleccione...',
        'nameCourse' => 'Seleccione...',
        'nameParent' => '',
        'lastNameParent' => '',
        'typeIDParent' => 'Seleccione...',
        'numberIDParent' => '',
        'birthdayParent' => '05/15/2019',
        'rhParent' => 'Seleccione...',
        'epsParent' => '',
        'religionParent' => '',
        'numberPhoneParent' => '',
        'parentezco' => 'Seleccione...',
    );


showElements($data);
echo "Acciones: Crear -> Persona (Estudiante y Familiar); Relacion Estudiante & Familiar; Asignar curso, asignar parentezco y añadir ID (EstudiantePadre) a Matricula.";
// Persona - Student & Familliar
        //relacion studentfamiliar
        
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
        echo("<script>alert('Datos $txt con Exito');window.open('" . getActualURL() . "', '_self');    </script>");

        //self::getConnection()->close();
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