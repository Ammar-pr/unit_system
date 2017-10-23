<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 23/10/17
 * Time: 09:56 ص
 */


require_once( '../unit_status.php' );
require_once ('vendor/autoload.php');

class unit_status_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new unit_status();

        $tested->Save(0,'test','test dis');

//$id=R::getInsertID();
      //  $var= R::load('unit_status',$id);
// after insert query table with submited values where id = id
     // data is saved as new row and id of this row chked

        $list = R::find( 'unit_status', ' status_name LIKE ? ', [ 'test%' ] );
        //echo $authors->status_name;
          foreach($list as $test_record){
             echo $test_record['status_name'];
            return   $this->assertEquals($test_record['status_name'],'test');
          }
        }
         //$this->assertEquals($var->id,$id);


    public  function test_update() {

        $tested= new unit_status();

       $record= $tested->Save(9,'test update','update');

// the funtion will reutrn 1 if the update is done

        if($record==1){
            return  $this->assertEquals(1,$record);
        }else if($record==0)

      return   $this->assertEquals(null,$record);
    }




    public  function test_fetchWithPK() {

        $tested= new unit_status();

        $var_test=$tested->fetchWithPK(20);
        //  $authors = R::convertToBeans( 'user_roles', $var );
        if($var_test->id!=0){
            $var_r= R::load('unit_status',$var_test->id);
              return  $this->assertEquals($var_r->id,$var_test->id);
        }else if ($var_test->id<=0){

              return $this->assertEquals(0,$var_test->id);
            // this case test for  not  laoding empty record , and handle it return
        }



    }



    public  function test_fetchWithAll() {

        $tested= new unit_status();

        $unit_list=$tested->fetchAll();




        // if $roles.lenght >0 ?
        foreach ($unit_list as $unit_object){
 // check every object come from that array table are in data base or not , by comparing id

            $var_r= R::load('unit_status',$unit_object['id']);
            $this->assertEquals($var_r->id,$unit_object['id']);
        }

    }


    public  function test_fetchWithAll_other() {

        $tested= new unit_status();

        $unit_list=$tested->fetchAll();




        $unit_list_count = R::count( 'unit_status' );

        $this->assertEquals($unit_list_count,count($unit_list));


    }



    public function test_delete () {
        $tested= new unit_status();

       $status= $tested->delete(7);

     if($status==1){
        $this->assertEquals(1,$status);
         }else if($status==0){
         // assume this case retrun zero because the function didn't delete the nonfound record
         $this->assertEquals(0,$status);
     }

    }



    public function test_delete_all () {
        $tested= new unit_status();

        $tested->deleteAll();


        $this->assertEquals(0,R::count( 'unit_status' ));

    }




}

