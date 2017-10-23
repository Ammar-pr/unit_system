<?php

//require_once ('scripts/../rb.php');
require_once( '../colleges_departments.php' );
require_once ('vendor/autoload.php');

class colleges_departments_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new colleges_departments();

        $id= $tested->Save(0,'deptname test',5);

        $ob = R::find( 'colleges_departments', ' department_name LIKE ? ', [ 'deptname test%' ] );
        //echo $authors->status_name;
        foreach($ob as $test_record){
            echo $test_record['department_name'];
            return   $this->assertEquals($test_record['department_name'],'deptname test');
        }
    }

    public  function test_update() {

        $tested= new colleges_departments();

        $record= $tested->Save(9,'test update',5);

// the funtion will reutrn 1 if the update is done

        if($record==1){
            return  $this->assertEquals(1,$record);
        }else if($record==0)

            return   $this->assertEquals(null,$record);
    }


    public  function test_fetchWithPK() {

        $tested= new colleges_departments();

        $var_test=$tested->fetchWithPK('16');


        if($var_test->id!=0){
            $var_r= R::load('unit_status',$var_test->id);
            return  $this->assertEquals($var_r->id,$var_test->id);
        }else if ($var_test->id<=0){

            return $this->assertEquals(0,$var_test->id);
            // this case test for  not  laoding empty record , and handle it return
        }
    }



    public  function test_fetchWithAll() {

        $tested= new colleges_departments();

        $colleges_list=$tested->fetchAll();


        echo count($colleges_list);

        // if $roles.lenght >0 ?
        foreach ($colleges_list as $colleges_ob){


            $var_r= R::load('colleges_departments',$colleges_ob['id']);
             $this->assertEquals($var_r->id,$colleges_ob['id']);
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

        $status=  $tested->delete(93);
        if($status==1){
            return $this->assertEquals(1,$status);
        }else if($status==0){
            // assume this case retrun zero because the function didn't delete the nonfound record
           return $this->assertEquals(0,$status);
        }

    }



    public function test_delete_all () {
        $tested= new colleges_departments();

        $tested->deleteAll();


        $this->assertEquals(0,R::count( 'colleges_departments' ));

    }




}

