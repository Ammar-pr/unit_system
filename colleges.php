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


function update ($college_object) {

}



function insert($college_object) {

}

}












?>