<?php

require_once ('C:\xampp\htdocs\unit\scripts\RedBeanPHP\rb.php');
require_once( '../users_roles.php' );
require_once ('vendor/autoload.php');

class user_roles_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

    $tested= new users_roles();

    $tested->Save('','fdgdf','44');
    $id= R::getInsertID();
    $var= R::load('user_roles',R::getInsertID());
    //echo R::getInsertID();



  // $this->assertEquals($var->id,$id);
}




    public  function test_fetchWithPK() {

        $tested= new users_roles();

      $var_test=$tested->fetchWithPK('80');
      //  $authors = R::convertToBeans( 'user_roles', $var );

      $var_r= R::load('user_roles',$var_test->id);


    //  echo  $var->id;

        //  $this->assertEquals($var_r->id,$var_test->id);
    }

    public  function test_fetchWithPK_other() {

        $tested= new users_roles();

        $var_test=$tested->fetchWithPK('80');



       //$this->assertEquals('80',$var_test->id);
    }

    public  function test_fetchWithAll() {

        $tested= new users_roles();

        $roles_list=$tested->fetchAll();


        echo count($roles_list);

           // if $roles.lenght >0 ?
        foreach ($roles_list as $role_ob){


            $var_r= R::load('user_roles',$role_ob['id']);
          // $this->assertEquals($var_r->id,$role_ob['id']);
        }

    }


    public  function test_fetchWithAll_other() {

        $tested= new users_roles();

        $roles_list=$tested->fetchAll();




        $list_roles_number = R::count( 'user_roles' );

        //  $this->assertEquals($list_roles_number,count($roles_list));


    }



    public function test_delete () {
    $tested= new users_roles();

    $tested->delete('93');

    $id =R::load('user_roles','93');
    // $id->isEmpty();


 //   $this->assertEquals('1',$id->isEmpty());

}



    public function test_delete_all () {
        $tested= new users_roles();

        $tested->deleteAll();


       $this->assertEquals('0',R::count( 'user_roles' ));

    }




}
