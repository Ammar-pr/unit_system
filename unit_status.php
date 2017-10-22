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























    public function get_unit_status()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }

        $unit_status=  R::findOne("unit_status",'id= ?',array($this->getId()));

        if(count($unit_status)!=0) {
            return $unit_status;
        }else {

            return null;
        }
    }


    public function get_unit_status_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_status_list = R::findAll('unit_status', ' ORDER BY id    ');
        if(count($unit_status_list)>0){

            return   $unit_status_list;
        }else {
            return null;

        }

    }



    public function delete_unit_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_status=  R::findOne("unit_status",'id= ?',array($this->getId()));

        if(count($unit_status)!=0) {
            R::trash($unit_status);
            echo "delete is done ";
        }else {
            echo "cannot delete becase the record is not exist ";
        }

    }

    public function delete_unit_status_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_status_list = R::findAll('unit_status', ' ORDER BY id    ');

        if (count($unit_status_list) > 0) {
            R::trashAll($unit_status_list);
            echo "data table unit_status deleted";
        }else {
            echo "the table is empty , empty table  ";
        }
    }








    function update_unit_status ()

    {

        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }


        R::ext('xdispense', function ($table_name){
            return R::getRedBean()->dispense($table_name)  ;
        });

        $unit_status= R::xdispense('unit_status');

        $unit_status_ob=  R::load('unit_status',$this->getId());
        try {
            if($unit_status_ob->getId()!=0){
                // will never come to this code unless the id is exist -

                $unit_status->status_name=$this->getStatusName();
                $unit_status->status_code=$this->getStatusCode();
                $unit_status->description=$this->getDescription();

                $unit_status->id=$this->getId();

                R::store($unit_status); //

            }else {
                echo "cannot update becuase the  id not exist";
            }

        }catch (Exception $ex){
            echo "Duplicate entry";
        }finally {
            R::close();

        }
    }
    function create_unit_status() {

        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }

        R::ext('xdispense', function ($table_name){
            return R::getRedBean()->dispense($table_name)  ;
        });

        $unit_status= R::xdispense('unit_status');



        $unit_status->status_name=$this->getStatusName();
        $unit_status->status_code=$this->getStatusCode();
        $unit_status->description=$this->getDescription();

        //  R::findOne("user_roles","name='' , role_number=''")
        try {
            R::store($unit_status); // store is done

        }catch (Exception $r){

            echo "Duplicate entry [Exception ] ";

        }finally {
            R::close();

        }  }


































}

?>