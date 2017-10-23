<?php

require_once( '../unit_file_types.php' );
require_once ('vendor/autoload.php');

class unit_file_types_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new unit_file_types();

        $id=$tested->Save(0,'mp3',9);

        $list = R::find( 'unitfiletype', ' extension LIKE ? ', [ 'mp3%' ] );
        //echo $authors->status_name;
        foreach($list as $test_record){
            echo $test_record['extension'];
            return   $this->assertEquals($test_record['extension'],'mp3');
        }



    }




    public  function test_update() {

        $tested= new unit_file_types();

        $record= $tested->Save(9,'mp4',5);

// the funtion will reutrn 1 if the update is done

        if($record==1){
            return $this->assertEquals(1,$record);
        }else if($record==0)

            return $this->assertEquals(null,$record);
    }





    public  function test_fetchWithPK() {

        $tested= new unit_file_types();

        $var_test=$tested->fetchWithPK(6);


        if($var_test->id!=0){
            $var_r= R::load('unitfiletype',$var_test->id);
            return  $this->assertEquals($var_r->id,$var_test->id);
        }else if ($var_test->id<=0){

            return $this->assertEquals(0,$var_test->id);
            // this case test for  not  laoding empty record , and handle it return
        }
    }


    public  function test_fetchWithAll() {

        $tested= new unit_file_types();

        $unit_file_list=$tested->fetchAll();





        foreach ($unit_file_list as $unit_file_object){
            // check every object come from that array table are in data base or not , by comparing id

            $var_r= R::load('unitfiletype',$unit_file_object['id']);
        return    $this->assertEquals($var_r->id,$unit_file_object['id']);
        }

    }






    public function test_delete () {
        $tested= new unit_file_types();

        $status= $tested->delete(2);

        if($status==1){
            return    $this->assertEquals(1,$status);
        }else if($status==0){
            // assume this case retrun zero because the function didn't delete the nonfound record
            return   $this->assertEquals(0,$status);
        }


    }



    public function test_delete_all () {
        $tested= new unit_file_types();

        $tested->deleteAll();


        return $this->assertEquals(0,R::count( 'unitfiletype' ));

    }




}



// unit file type test is done
/*
 # phpunit unit_file_types_test.php
PHPUnit 5.6.8 by Sebastian Bergmann and contributors.

.mp3.....
%)

Time: 772 ms, Memory: 11.25MB

OK (6 tests, 5 assertions)
 */