<?php
class course
{
    private $table = "course";
    private $Connection;
    private $id;
    private $course_name;
    private $batch;
    private $duration;
    private $fees;

    public function __construct($Connection)
    {
        $this->Connection = $Connection;
    }
    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;
    }

    public function getcourse_name()
    {
        return $this->course_name;
    }
    public function setcourse_name($course_name)
    {
        $this->course_name = $course_name;
    }


    public function getbatch()
    {
        return $this->batch;
    }
    public function setbatch($batch)
    {
        $this->batch = $batch;
    }


    public function getduration()
    {
        return $this->duration;
    }
    public function setduration($duration)
    {
        $this->duration = $duration;
    }


    public function getfees()
    {
        return $this->fees;
    }
    public function setfees($fees)
    {
        $this->fees = $fees;
    }

    public function getAll()
    {
        $consultation = $this->Connection->prepare("SELECT id,coursename,batch,duration,fees FROM " . $this->table);
        $consultation->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $resultados;
    }

    public function getBy($column, $value)
    {
        $consultation = $this->Connection->prepare("SELECT id,coursename,batch,duration,fees
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
        $sql = 'select count(*) as count from course';
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
