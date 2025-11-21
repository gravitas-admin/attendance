<?php
class usersController
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
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->index();
                break;
        }
    }
    /**
     * Loads the user home page with the list of
     * user getting from the model.
     *
     */
    public function index()
    {
        //We create the user object
        // $user = new user($this->Connection);
        //We get all the user
        //We load the index view and pass values to it
        $this->view("login", array());
    }

    /**
     * checking login credentials.
     *
     */
    public function login()
    {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        //We create the user object
        $user = new user($this->Connection);
        // Quick local admin: allow specific host/pass to go to admin dashboard
        if (trim($username) === 'host' && trim($password) === 'pass') {
            $this->startSession($username);
            header("Location: " . '?controller=dashboard&action=admin');
            return;
        }
        //We get all the user
        // database schema uses table `login` (see sql/database.sql)
        $sql = "select * from login where user_name ='" . $username . "' and password = '" . $password . "'; ";
        $user = $user->getBySql($sql);

        if (count($user) == 1) {
            $this->startSession($username);
            header("Location: " . '?controller=dashboard');
        } else {
            $this->view("login", array(
                "error" => "Invaid User Name or Password",
            ));
        }
    }

    public function startSession($username){
        session_start();
        // we can set session keys here
        $_SESSION["id"] = 'gravitas-'.$username;
        $_SESSION["login_time_stamp"] = time(); 
    } 

    public function logout(){
        session_destroy();
        $this->view("login", array());
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
