<?php

class colleges {


    protected $college_id;
    protected $name ;
    function __construct($college_id,$name) {
        $this->college_id = $college_id;
        $this->name = $name;
    }

    /**
     * @param mixed $college_id
     */
    public function setCollegeId($college_id)
    {
        $this->college_id = $college_id;
    }

    /**
     * @return mixed
     */
    public function getCollegeId()
    {
        return $this->college_id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}












?>