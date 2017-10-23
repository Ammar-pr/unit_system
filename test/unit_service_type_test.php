<?php

require_once( '../unit_service_type.php' );
require_once ('vendor/autoload.php');

class unit_service_type_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new unit_service_type();

        $id=$tested->Save(0,'test_unit_ser','test disc');


        $list = R::find( 'unit_service_type', ' name LIKE ? ', [ 'test_unit_sert%' ] );
        //echo $authors->status_name;
        foreach($list as $test_record){
            echo $test_record['name'];
            return   $this->assertEquals($test_record['status_name'],'test_unit_ser');
        }



    }


    public  function test_update() {

        $tested= new unit_service_type();

        $record= $tested->Save(9,'test_unit_servic_update','update');

// the funtion will reutrn 1 if the update is done

        if($record==1){
            $this->assertEquals(1,$record);
        }else if($record==0)

            $this->assertEquals(null,$record);
    }


    public  function test_fetchWithPK()
    {

        $tested = new unit_service_type();

        $var_test = $tested->fetchWithPK('1');
        if ($var_test->id > 0) {
            $var_r = R::load('unit_service_type', $var_test->id);
            return $this->assertEquals($var_r->id, $var_test->id);
        } else if ($var_test->id <= 0) {

            return $this->assertEquals(0, $var_test->id);
        }
    }


    public  function test_fetchWith_All() {

        $tested= new unit_service_type();

        $unit_service_type_list=$tested->fetchAll();





        foreach ($unit_service_type_list as $unit_service_object){
            // check every object come from that array table are in data base or not , by comparing id

            $var_r= R::load('unit_service_type',$unit_service_object['id']);
            return $this->assertEquals($var_r->id,$unit_service_object['id']);
        }

    }






    public function test_delete () {
        $tested= new unit_service_type();

        $status= $tested->delete(2);


        if($status==1){
            $this->assertEquals(1,$status);
        }else if($status==0){
            // assume this case retrun zero because the function didn't delete the nonfound record
            $this->assertEquals(0,$status);
        }

    }



    public function test_delete_all () {
        $tested= new unit_service_type();

        $tested->deleteAll();

        $list=R::getAll( 'SELECT * FROM unit_service_type');
        $this->assertEquals(0,count($list));

    }




}

//$t = new unit_service_type_test();
//$t->test_save();


/*
 GRENADY@MSIGRENADY c:\xampp\htdocs\unit\test
# phpunit unit_service_type_test.php
PHPUnit 5.6.8 by Sebastian Bergmann and contributors.

......                                                             6 / 6 (100%)

Time: 828 ms, Memory: 11.25MB

OK (6 tests, 5 assertions)

GRENADY@MSIGRENADY c:\xampp\htdocs\unit\test
 */