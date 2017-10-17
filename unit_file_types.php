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
            echo "result of extesion".$this->getExtension();
        try {
            $status= R::exec( 'update unitfiletype set extension="'.$this->getExtension().'"   where id="'.$this->getId().'"' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


    function insert() {
        $unit_file_type= R::dispense('unitfiletype');



        $unit_file_type->extension=$this->getExtension();
        $unit_file_type->unit_id=$this->getUnitId();


        $id_redbean_unit_file_type_id=  R::store($unit_file_type); // store is done
        if($id_redbean_unit_file_type_id>0){

        }else {
            echo "the data cannot be inserted in the table unit file type";
        }
    }
}

?>