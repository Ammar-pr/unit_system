<?php

require_once( '../users.php' );
require_once ('vendor/autoload.php');

class users_test extends \PHPUnit_Framework_TestCase
{


    public  function test_save() {

        $tested= new users();

        $tested->Save(0,'gfhgsdf@hotmail.com',134,2,27,'amdf',503448871,'drdfevd');
        $list = R::find( 'users', ' email LIKE ? ', [ 'xxf@hotmail.com%' ] );
        //echo $authors->status_name;
        foreach($list as $test_record){

            return   $this->assertEquals($test_record['email'],'xxf@hotmail.com');
        }


    }
    public  function test_update() {

        $tested= new users();

        $record= $tested->Save(4,'test@hotmail.com',134,2,27,'amdf',503448651,'drdfevd');

// the funtion will reutrn 1 if the update is done

        if($record==1){
            $this->assertEquals(1,$record);
        }else if($record==0)

            $this->assertEquals(null,$record);
    }


    public function test_login () {
        $tested= new users();
        $status =$tested->login('eef@hotmail.com','ff');
        if($status==true){
            return  $this->assertEquals(true,$status);
        }else if($status==false){
            return  $this->assertEquals(false,$status);

        }
    }




    public  function test_fetchWithPK() {

        $tested= new users();
        $var_test=$tested->fetchWithPK('20');
        if($var_test->id!=0){
            $var_r= R::load('users',$var_test->id);
            return  $this->assertEquals($var_r->id,$var_test->id);
        }else if ($var_test->id<=0){

            return $this->assertEquals(0,$var_test->id);
        }

    }


    public  function test_fetch_All() {

        $tested= new users();

        $users_list=$tested->fetchAll();


        // if $roles.lenght >0 ?
        foreach ($users_list as $user){
            // check every object come from that array table are in data base or not , by comparing id

            $var_r= R::load('users',$user['id']);
            $this->assertEquals($var_r->id,$user['id']);
        }

    }





    public function test_delete () {
        $tested= new users();

        $status= $tested->delete('2');

        if($status==1){
            $this->assertEquals('1',$status);
        }else if($status==0){
            // assume this case retrun zero because the function didn't delete the nonfound record
            $this->assertEquals('0',$status);
        }

    }



    public function test_delete_all () {
        $tested= new users();

        $tested->deleteAll();


        $this->assertEquals('0',R::count( 'users' ));

    }




}
