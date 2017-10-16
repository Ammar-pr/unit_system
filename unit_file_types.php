<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 11:02 م
 */

class unit_file_types
{
 protected $type_id;
 protected  $unit_id;
 protected  $extension;

    public function __construct($type_id,$unit_id,$extension) {
        $this->extension = $extension;
        $this->type_id = $type_id;
        $this->unit_id = $unit_id;

    }


    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * @param mixed $unit_id
     */
    public function setUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @return mixed
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

}