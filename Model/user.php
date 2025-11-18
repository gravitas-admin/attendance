<?php
class User
{
    private $table = "users";
    private $Connection;
    private $username;
    private $password;
    public function __construct($Connection)
    {
        $this->Connection = $Connection;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getAll()
    {
        $consultation = $this->Connection->prepare("SELECT username,password FROM " . $this->table);
        $consultation->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $resultados;
    }

    public function getBy($column, $value)
    {
        $consultation = $this->Connection->prepare("SELECT Username,password 
                                                FROM " . $this->table . " WHERE :column = :value");
        $consultation->execute(array(
            "column" => $column,
            "value" => $value
        ));
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //connection closure
        return $resultados;
    }

    public function getBySql($sql)
    {
        $consultation = $this->Connection->prepare($sql);
        $consultation->execute(array());
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //connection closure
        return $resultados;
    }
}
