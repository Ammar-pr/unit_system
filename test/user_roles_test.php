<?php

require_once( '../users_roles.php' );
require_once ('vendor/autoload.php');

class user_roles_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

    $tested= new users_roles();

    $tested->Save(0,'test userrole');
        $list = R::find( 'unit_status', ' role_name LIKE ? ', [ 'test userrole%' ] );
        //echo $authors->status_name;
        foreach($list as $test_record){
            echo $test_record['role_name'];
            return   $this->assertEquals($test_record['role_name'],'test');
        }


}
    public  function test_update() {

        $tested= new users_roles();

        $record= $tested->Save(9,'newrole resting');

// the funtion will reutrn 1 if the update is done

        if($record==1){
            $this->assertEquals(1,$record);
        }else if($record==0)

            $this->assertEquals(null,$record);
    }




    public  function test_fetchWithPK() {

        $tested= new users_roles();
        // user_roles
        $var_test=$tested->fetchWithPK('20');
        //  $authors = R::convertToBeans( 'user_roles', $var );
        if($var_test->id!=0){
            $var_r= R::load('user_roles',$var_test->id);
              return  $this->assertEquals($var_r->id,$var_test->id);
        }else if ($var_test->id<=0){

              return $this->assertEquals(0,$var_test->id);
            // this case test for  not  laoding empty record , and handle it return
        }

    }

    public  function test_fetchWithPK_other() {

        $tested= new users_roles();

        $var_test=$tested->fetchWithPK(6);

  if($var_test->id>0) {
      $this->assertEquals(17, $var_test->id);
  } else if($var_test->id==0){
  $this->assertEquals(0, $var_test->id);
    } }

    public  function test_fetch_All() {

        $tested= new users_roles();

        $roles_list=$tested->fetchAll();


        // if $roles.lenght >0 ?
        foreach ($roles_list as $role){
            // check every object come from that array table are in data base or not , by comparing id

            $var_r= R::load('user_roles',$role['id']);
            $this->assertEquals($var_r->id,$role['id']);
        }

    }





    public function test_delete () {
    $tested= new users_roles();

        $status= $tested->delete('93');

        if($status==1){
            $this->assertEquals('1',$status);
        }else if($status==0){
            // assume this case retrun zero because the function didn't delete the nonfound record
            $this->assertEquals('0',$status);
        }

}



    public function test_delete_all () {
        $tested= new users_roles();

        $tested->deleteAll();


       $this->assertEquals('0',R::count( 'user_roles' ));

    }




}
/*
 * # phpunit user_roles_test.php
PHPUnit 5.6.8 by Sebastian Bergmann and contributors.

.......

Time: 760 ms, Memory: 11.25MB

OK (7 tests, 6 assertions)

GRENADY@MSIGRENADY c:\xampp\htdocs\unit\test
 */