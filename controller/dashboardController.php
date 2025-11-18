<?php
class dashboardController
{
    private $conectar;
    private $Connection;
    public function __construct()
    {
        require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/user.php";
        require_once  __DIR__ . "/../model/student.php";
        require_once  __DIR__ . "/../model/teacher.php";
        require_once  __DIR__ . "/../model/course.php";
        $this->conectar = new Conectar();
        $this->Connection = $this->conectar->Connection();
    }
    /**
     * Ejecuta la acción correspondiente.
     *
     */
    public function run($accion)
    {
        switch ($accion) {
            default:
                $this->dashboard();
                break;
        }
    }

    /**
     * checking login credentials.
     *
     */
    public function dashboard()
    {
        // $this->startSession();
        $students = new student($this->Connection);
        $studentsCount = $students->getTotalCount();
        $teacher = new teacher($this->Connection);
        $teacherCount = $teacher->getTotalCount();
        $course = new course($this->Connection);
        $courseCount = $course->getTotalCount();
        $course = new course($this->Connection);
        $coursedetails=$course->getAll();

        //print_r($coursedetails);
        $this->view("dashboard", array(
            "studentCount" => $studentsCount,
            "teacherCount" => $teacherCount,
            "courseCount" => $courseCount,
            "coursedetails" => $coursedetails,

        ));
    }

    /**
     * Create the view that we pass to it with the indicated data.
     *
     */
    public function view($vista, $datos)
    {
        $data = $datos;
        require_once  __DIR__ . "/../view/" . $vista . "View.php";
    }
}
