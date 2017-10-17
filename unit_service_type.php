<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 12:45 ص
 */

class unit_service_type
{


    protected $id;// auto increament
    protected  $name;
    protected $description;



    function __construct($name,$description) {
      $this->name=$name;
      $this->description=$description;
    }


    /**
     * @param mixed $unit_id
     */


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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

//unitservicetype
    public  function get_unit_service_type_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM unitservicetype where id='".$this->getId()."'");
            R::convertToBeans( 'user', $row );
            if(count($row)>0){
                echo "the lenght for the row is :- ";
           echo count($row);
                return $row;
            }else {
                return null;
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }

    public function delete_unit_service_type_object() {

        try {
            if(  R::exec( 'delete from  unitservicetype    WHERE id ="'.$this->getId().'" ')==1){

            }else{
                echo"there is issue with delete ...";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }






    public function delete_unit_service_All_records() {

        try {
            if(  R::exec( 'delete from  unitservicetype  ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }
    public function delete_user_role_All_object() {

        try {
            if(  R::exec( 'delete  from  usersroles ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }



    function update(){

        try {
            $status= R::exec( 'update unitservicetype set name="'.$this->getName().'" , description="'.$this->getDescription().'"   where id="'.$this->getId().'"' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


    function insert() {
        $unit_service_type= R::dispense('unitservicetype');



        $unit_service_type->name=$this->getName();
        $unit_service_type->description=$this->getDescription();


        $id_redbean_unit_service_type_id=  R::store($unit_service_type); // store is done
        if($id_redbean_unit_service_type_id>0){

        }else {
            echo "the data cannot be inserted in the table unit service type";
        }
    }



}

