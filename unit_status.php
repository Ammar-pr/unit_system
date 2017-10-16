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


protected $status_id;// autoincreament
protected $status_name;
protected  $status_code;
protected  $desc;
    function __construct($status_name,$status_code,$desc) {
        $this->status_name = $status_name;
        $this->status_code;
        $this->desc = $desc;

    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @param mixed $status_code
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
    }

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
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }


}

?>