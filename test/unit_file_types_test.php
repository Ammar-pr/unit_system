<?php

require_once ('C:\xampp\htdocs\unit\scripts\RedBeanPHP\rb.php');
require_once( '../unit_file_types.php' );
require_once ('vendor/autoload.php');

class unit_file_types_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new unit_file_types();

        $id=$tested->Save('','wored','5');
       if($id>0)
       {
           $var= R::load('unitfiletype',$id);
           $this->assertEquals($var->id,$id);
       }else {
           $id= R::getInsertID();
        $var= R::load('unitfiletype',R::getInsertID());
           $this->assertEquals($var->id,$id);
       }




    }




    public  function test_fetchWithPK() {

        $tested= new unit_file_types();

        $var_test=$tested->fetchWithPK('1');


        $var_r= R::load('unitfiletype',$var_test->id);



      $this->assertEquals($var_r->id,$var_test->id);
    }

    public  function test_fetchWithPK_other() {

        $tested= new unit_file_types();

        $var_test=$tested->fetchWithPK('1');



       $this->assertEquals('1',$var_test->id);
    }

    public  function test_fetchWithAll() {

        $tested= new unit_file_types();

        $unit_file_list=$tested->fetchAll();


        echo count($unit_file_list);

        // if $roles.lenght >0 ?
        foreach ($unit_file_list as $file_ob){


            $var_r= R::load('unitfiletype',$file_ob['id']);
            $this->assertEquals($var_r->id,$file_ob['id']);
        }

    }






    public function test_delete () {
        $tested= new unit_file_types();

        $tested->delete('2');

        $id =R::load('unitfiletype','2');
        // $id->isEmpty();


      $this->assertEquals('1',$id->isEmpty());

    }



    public function test_delete_all () {
        $tested= new unit_file_types();

        $tested->deleteAll();


        $this->assertEquals('0',R::count( 'unitfiletype' ));

    }




}




