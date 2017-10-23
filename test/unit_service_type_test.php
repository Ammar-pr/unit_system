<?php

require_once ('C:\xampp\htdocs\unit\scripts\RedBeanPHP\rb.php');
require_once( '../unit_service_type.php' );
require_once ('vendor/autoload.php');

class unit_service_type_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new unit_service_type();

        $id=$tested->Save('','sss','sss');
        if($id>0)
        {
            $var= R::load('unit_service_type',$id);
            $this->assertEquals($var->id,$id);
        }else {
            $id= R::getInsertID();
            $var= R::load('unit_service_type',R::getInsertID());
            $this->assertEquals($var->id,$id);
        }




    }




    public  function test_fetchWithPK() {

        $tested= new unit_service_type();

        $var_test=$tested->fetchWithPK('1');


        $var_r= R::load('unit_service_type',$var_test->id);



        $this->assertEquals($var_r->id,$var_test->id);
    }

    public  function test_fetchWithPK_other() {

        $tested= new unit_service_type();

        $var_test=$tested->fetchWithPK('1');



        $this->assertEquals('1',$var_test->id);
    }

    public  function test_fetchWithAll() {

        $tested= new unit_service_type();

        $unit_service_type_list=$tested->fetchAll();


        echo count($unit_service_type_list);

        // if $roles.lenght >0 ?
        foreach ($unit_service_type_list as $unit_service_type_ob){


            $var_r= R::load('unit_service_type',$unit_service_type_ob['id']);
            $this->assertEquals($var_r->id,$unit_service_type_ob['id']);
        }

    }






    public function test_delete () {
        $tested= new unit_service_type();

        $tested->delete('2');

        $id =R::load('unit_service_type','2');
        // $id->isEmpty();


        $this->assertEquals('1',$id->isEmpty());

    }



    public function test_delete_all () {
        $tested= new unit_service_type();

        $tested->deleteAll();


        $this->assertEquals('0',R::count( 'unit_service_type' ));

    }




}

//$t = new unit_service_type_test();
//$t->test_save();


