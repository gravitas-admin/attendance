<?php
class usersController
{
    private $conectar;
    private $Connection;
    public function __construct()
    {
        require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/user.php";
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
            case 'add':
                $this->add();
                break;
            case 'Rename':
                $this->rename();
                break;
            case 'Update':
                $this->update();
                break;
            case 'View all':
                $this->viewAll();
                break;
            default:
                // need to decide
        }
    }


    public function add()
    {
    }

    public function rename()
    {
    }

    public function update()
    {
    }

    public function viewall()
    {
    }
}
