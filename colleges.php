<?php

class colleges {


    protected $college_id;
    protected $name ;
    function __construct($name) {
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
    public  function get_colleges_depratment_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM colleges where id='".$this->getCollegeId()."'");
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


    public  function get_colleges_object_list()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM colleges ");
            R::convertToBeans( 'colleges', $row );
            if(count($row)>0){

                return $row;
            }else {

                return null;
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }











    public function delete_college_object() {

        try {
            if(  R::exec( 'delete from  colleges    WHERE id ="'.$this->getCollegeId().'" ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }



    public function delete_college_All_records() {

        try {
            if(  R::exec( 'delete from  colleges  ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }



    function update(){

        try {
            $status= R::exec( 'update colleges set name="'.$this->getName().'"   where id="'.$this->getCollegeId().'"' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


function insert() {
    $colleges= R::dispense('colleges');



    $colleges->name=$this->getName();


  $id_redbean_colleges_id=  R::store($colleges); // store is done
    if($id_redbean_colleges_id>0){

    }else {
     echo "the data cannot be inserted in the table colleges";
    }
}

}












?>