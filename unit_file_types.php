<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 11:02 م
 */

class unit_file_types
{
 protected $id; // auto increament
 protected  $unit_id;
 protected  $extension; // path

    public function __construct($unit_id,$extension) {
        $this->extension = $extension;
        $this->unit_id = $unit_id;

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
    public  function get_unit_file_type_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM unitfiletype where id='".$this->getId()."'");
            R::convertToBeans( 'user', $row );
            if(count($row)>0){

                return $row;
            }else {
                return null;
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }

    public function delete_unit_file_type_object() {

        try {
            if(  R::exec( 'delete from  unitfiletype    WHERE id ="'.$this->getId().'" ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }


    function update(){

        try {
            $status= R::exec( 'update unitfiletype set name="'.$this->getName().'"   where id="'.$this->getId().'"' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


    function insert() {
        $colleges= R::dispense('unitfiletype');



        $colleges->name=$this->getName();


        $id_redbean_colleges_id=  R::store($colleges); // store is done
        if($id_redbean_colleges_id>0){

        }else {
            echo "the data cannot be inserted in the table unit file type";
        }
    }
}

?>