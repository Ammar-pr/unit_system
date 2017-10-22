<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:08 ص
 */

class unit_status
{


    //status_id	status_name	status_code	desc


protected $id;// autoincreament
protected $status_name;
protected  $status_code;
protected  $description;
    function __construct($status_name,$status_code,$desc) {
        $this->status_name = $status_name;
        $this->status_code=$status_code;
        $this->description=$desc;

    }

    /**
     * @param mixed $desc
     */




    /**
     * @param mixed $status_id
     */


    /**
     * @param mixed $status_name
     */
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
    }

    /**
     * @return mixed
     */




    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @param mixed $status_code
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

























































}

?>