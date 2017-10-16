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

    public function __construct($unit_id,$extension) {
        $this->extension = $extension;
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
   

    /**
     * @return mixed
     */
    public function getUnitId()
    {
        return $this->unit_id;
    }

}