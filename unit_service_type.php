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

    public function get_unit_service_type()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }

        $unit_service_type=  R::findOne("unit_service_type",'id= ?',array($this->getId()));

        if(count($unit_service_type)!=0) {
            return $unit_service_type;
        }else {

            return null;
        }
    }


    public function get_unit_service_type_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_service_type_list = R::findAll('unit_service_type', ' ORDER BY id    ');
        if(count($unit_service_type_list)>0){

            return   $unit_service_type_list;
        }else {
            return null;

        }

    }



    public function delete_unit_service_type()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_service_type=  R::findOne("unit_service_type",'id= ?',array($this->getId()));

        if(count($unit_service_type)!=0) {
            R::trash($unit_service_type);
            echo "delete is done ";
        }else {
            echo "cannot delete becase the record is not exist ";
        }

    }

    public function delete_unit_service_type_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $unit_service_type_list = R::findAll('unit_service_type', ' ORDER BY id    ');

        if (count($unit_service_type_list) > 0) {
            R::trashAll($unit_service_type_list);
            echo "data table unit_service_type deleted";
        }else {
            echo "the table is empty , empty table  ";
        }
    }



    function update_unit_service_type ()

    {

        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }


        R::ext('xdispense', function ($table_name){
            return R::getRedBean()->dispense($table_name)  ;
        });

        $unit_service_type= R::xdispense('unit_service_type');

        $unit_service_type_ob=  R::load('unit_service_type',$this->getId());
        try {
            if($unit_service_type_ob->getId()!=0){
                // will never come to this code unless the id is exist -

                $unit_service_type->name=$this->getName();
                $unit_service_type->description=$this->getDescription();


                $unit_service_type->id=$this->getId();

                R::store($unit_service_type); //

            }else {
                echo "cannot update becuase the  id not exist";
            }

        }catch (Exception $ex){
            echo "Duplicate entry";
        }finally {
            R::close();

        }
    }
    function create_unit_service_type() {

        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }

        R::ext('xdispense', function ($table_name){
            return R::getRedBean()->dispense($table_name)  ;
        });

        $unit_service_type= R::xdispense('unit_service_type');



        $unit_service_type->name=$this->getName();
        $unit_service_type->description=$this->getDescription();

        try {
            R::store($unit_service_type); // store is done

        }catch (Exception $r){

            echo "Duplicate entry [Exception ] ";

        }finally {
            R::close();

        }  }


}

