<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 12:45 ص
 */

class unit_service_type
{


    protected $unit_id;// auto increament
    protected  $name;
    protected $description;



    function __construct($dept_id,$college_id,$department_name) {


    }


    /**
     * @param mixed $unit_id
     */
    public function setUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}