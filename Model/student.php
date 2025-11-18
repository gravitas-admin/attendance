<?php
class student
{
    private $table = "student";
    private $Connection;
    private $id;
    private $name;
    private $gender;
    private $address;
    private $email;
    private $contact;
    private $adharnumber;
    private $Joiningdate;
    private $currentstatus;

    public function __construct($Connection)
    {
        $this->Connection = $Connection;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContact()
    {
        return $this->contact;
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getAdharNumber()
    {
        return $this->adharnumber;
    }
    public function setadharnumber($adharnumber)
    {
        $this->adharnumber = $adharnumber;
    }
    public function getJoiningdate()
    {
        return $this->Joiningdate;
    }
    public function setJoiningdate($Joiningdate)
    {
        $this->Joiningdate = $Joiningdate;
    }
    public function getCurrentstatus()
    {
        return $this->currentstatus;
    }
    public function setCurrentstatus($currentstatus)
    {
        $this->currentstatus = $currentstatus;
    }


    // functions to get student
    public function getAll()
    {
        $consultation = $this->Connection->prepare("SELECT id,name,gender,address,email,contact,adhar_number,joining_date,current_status FROM " . $this->table);
        $consultation->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $resultados;
    }

    public function getBy($column, $value)
    {
        $consultation = $this->Connection->prepare("SELECT id,name,gender,address,email,contact,adharnumber,joiningdate,currentstatus 
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
        $sql = 'select count(*) as count from student';
        $consultation = $this->Connection->prepare($sql);
        $consultation->execute(array());
        $resultados = $consultation->fetch();
        $this->Connection = null; //connection closure
        return $resultados['count'];
    }

    // functions to add Student
    public function saveStudent($id, $name)
    {
    }
}
