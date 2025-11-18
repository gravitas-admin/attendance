<?php
class teacher
{
    private $table = "teacher";
    private $Connection;
    private $Id;
    private $Name;
    private $Gender;
    private $Address;
    private $Email;
    private $Contact;
    private $Adharnumber;
    private $Joiningdate;
    private $Status;
    private $Salary;

    public function __construct($Connection)
    {
        $this->Connection = $Connection;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function setId($id)
    {
        $this->Id = $id;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function setName($name)
    {
        $this->Name = $name;
    }
    public function getGender()
    {
        return $this->Gender;
    }
    public function setGender($gender)
    {
        $this->Gender = $gender;
    }
    public function getAddress()
    {
        return $this->Address;
    }
    public function setAddress($address)
    {
        $this->Address = $address;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($email)
    {
        $this->Email = $email;
    }
    public function getContact()
    {
        return $this->Contact;
    }
    public function setContact($contact)
    {
        $this->Contact = $contact;
    }
    public function getAdharnumber()
    {
        return $this->Adharnumber;
    }
    public function setAdharnumber($adharnumber)
    {
        $this->Adharnumber = $adharnumber;
    }
    public function getJoining_date()
    {
        return $this->Joiningdate;
    }
    public function setJoiningdate($joiningdate)

    {
        $this->Joiningdate = $joiningdate;
    }
    public function getStatus()
    {
        return $this->Status;
    }
    public function setStatus($status)
    {
        $this->Status = $status;
    }
    public function getSalary()
    {
        return $this->Salary;
    }
    public function setSalary($salary)
    {
        $this->Salary = $salary;
    }



    public function getAll()
    {
        $consultation = $this->Connection->prepare("SELECT Id,Name,Gender,Address,Email,Contact,Adharnumber,Joiningdate,Status,Salary FROM " . $this->table);
        $consultation->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $resultados;
    }

    public function getBy($column, $value)
    {
        $consultation = $this->Connection->prepare("SELECT Id,Name,Gender,Address,Email,Contact,Adharnumber,Joiningdate,Status,Salary
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

    public function getTotalCount()
    {
        $sql = 'select count(*) as count from teacher';
        $consultation = $this->Connection->prepare($sql);
        $consultation->execute(array());
        $resultados = $consultation->fetch();
        $this->Connection = null; //connection closure
        return $resultados['count'];
    }
}
