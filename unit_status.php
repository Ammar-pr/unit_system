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






    public  function get_unit_status_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM unitstatus where id='".$this->getId()."'");
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

    public function delete_unit_status_object() {

        try {
            if(  R::exec( 'delete from  unitstatus    WHERE id ="'.$this->getId().'" ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }


    function update(){

        try {
            $status= R::exec( 'update unitstatus set status_name="'.$this->getStatusName().'" ,description= "'.$this->getDescription().'"  , status_code="'.$this->getStatusCode().'"   where id="'.$this->getId().'" ' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


    function insert() {
        $unitstatus= R::dispense('unitstatus');



        $unitstatus->status_name=$this->getStatusName();
        $unitstatus->status_code=$this->getStatusCode();
        $unitstatus->description=$this->getDescription();

        $id_redbean_unit_status_id=  R::store($unitstatus); // store is done
        if($id_redbean_unit_status_id>0){

        }else {
            echo "the data cannot be inserted in the table unit status table ...";
        }
    }






















}

?>