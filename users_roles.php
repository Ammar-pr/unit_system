<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:20 ص
 */

class users_roles
{
//role_id	role_number	role_name

    protected $id;
    protected $role_number;
    protected $role_name;


    function __construct($role_number, $role_name, $id)
    {
        $this->id = $id;
        $this->role_number = $role_number;
        $this->role_name = $role_name;
    }


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $role_name
     */
    public function setRoleName($role_name)
    {
        $this->role_name = $role_name;
    }

    /**
     * @param mixed $role_number
     */
    public function setRoleNumber($role_number)
    {
        $this->role_number = $role_number;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * @return mixed
     */
    public function getRoleNumber()
    {
        return $this->role_number;

    }


    public function get_user_role()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }

        $use_r=  R::findOne("user_roles",'id= ?',array($this->getId()));

        if(count($use_r)!=0) {
        return $use_r;
        }else {

        return null;
        }
    }


    public function get_user_role_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $roles_list = R::findAll('user_roles', ' ORDER BY id    ');
        if(count($roles_list)>0){

            return   $roles_list;
        }else {
            return null;

        }

    }



    public function delete_user_role()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
      $use_r=  R::findOne("user_roles",'id= ?',array($this->getId()));

      if(count($use_r)!=0) {
          R::trash($use_r);
          echo "delete is done ";
      }else {
          echo "cannot delete becase the record is not exist ";
      }

    }

    public function delete_user_roles_list()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
        $roles_list = R::findAll('user_roles', ' ORDER BY id    ');

        if (count($roles_list) > 0) {
            R::trashAll($roles_list);
            echo "data table user_roles deleted";
        }else {
            echo "the table is empty , empty table  ";
        }
    }




function update_user_role ()

{

    if(!R::testConnection()){
        exit("data base not connect please check ...");
    }


    R::ext('xdispense', function ($table_name){
        return R::getRedBean()->dispense($table_name)  ;
    });

    $users_roles= R::xdispense('user_roles');

$role_ob=  R::load('user_roles',$this->getId());
try {
if($role_ob->getId()!=0){
     // will never come to this code unless the id is exist -

     $users_roles->role_number=$this->getRoleNumber();
     $users_roles->role_name=$this->getRoleName();
     $users_roles->id=$this->getId();

      R::store($users_roles); //

 }else {
     echo "cannot update becuase the user id not exist";
 }

}catch (Exception $ex){
 echo "Duplicate entry";
}finally {
    R::close();

}
}
    function create_user_role() {

    if(!R::testConnection()){
        exit("data base not connect please check ...");
    }

     R::ext('xdispense', function ($table_name){
       return R::getRedBean()->dispense($table_name)  ;
     });

        $users_roles= R::xdispense('user_roles');



        $users_roles->role_number=$this->getRoleNumber();
        $users_roles->role_name=$this->getRoleName();
      //  R::findOne("user_roles","name='' , role_number=''")
 try {
    R::store($users_roles); // store is done

 }catch (Exception $r){

     echo "Duplicate entry [Exception ] ";

        }finally {
     R::close();

 }  }













}