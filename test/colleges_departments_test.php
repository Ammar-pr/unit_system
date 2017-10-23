<?php

require_once ('C:\xampp\htdocs\unit\scripts\RedBeanPHP\rb.php');
require_once( '../colleges_departments.php' );
require_once ('vendor/autoload.php');

class colleges_departments_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new colleges_departments();

        $id= $tested->Save('','sdfdfs','5');
        if($id>0)
        {
            $var= R::load('colleges_departments',$id);
            $this->assertEquals($var->id,$id);
        }else {
            $id= R::getInsertID();
            $var= R::load('colleges_departments',R::getInsertID());
            $this->assertEquals($var->id,$id);
        }
    }




    public  function test_fetchWithPK() {

        $tested= new colleges_departments();

        $var_test=$tested->fetchWithPK('16');


        $var_r= R::load('colleges_departments',$var_test->id);



         $this->assertEquals($var_r->id,$var_test->id);
    }

    public  function test_fetchWithPK_other() {

        $tested= new colleges_departments();

        $var_test=$tested->fetchWithPK('80');



        //$this->assertEquals('80',$var_test->id);
    }

    public  function test_fetchWithAll() {

        $tested= new colleges_departments();

        $colleges_list=$tested->fetchAll();


        echo count($colleges_list);

        // if $roles.lenght >0 ?
        foreach ($colleges_list as $colleges_ob){


            $var_r= R::load('colleges_departments',$colleges_ob['id']);
             $this->assertEquals($var_r->id,$role_ob['id']);
        }

    }


    public  function test_fetchWithAll_other() {

        $tested= new colleges_departments();

        $colleges_list=$tested->fetchAll();




        $colleges_list_number = R::count( 'colleges_departments' );

         $this->assertEquals($colleges_list_number,count($colleges_list));


    }



    public function test_delete () {
        $tested= new colleges_departments();

        $tested->delete('93');

        $id =R::load('colleges_departments','93');
        // $id->isEmpty();


         $this->assertEquals('1',$id->isEmpty());

    }



    public function test_delete_all () {
        $tested= new colleges_departments();

        $tested->deleteAll();


        $this->assertEquals('0',R::count( 'colleges_departments' ));

    }




}

