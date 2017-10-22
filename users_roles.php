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


    public function get_user_role_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM usersroles where id='" . $this->getId() . "'");
            R::convertToBeans('user', $row);
            if (count($row) > 0) {

                return $row;
            } else {

                return null;
            }
        } catch (SQLiteException $sq) {
            $sq->getMessage();
        }
    }


    public function get_user_role_object_list()
    {
        $roles_list = R::findAll('user_roles', ' ORDER BY id    ');
        if()

    }



    public function delete_user_role_object()
    {
        if(!R::testConnection()){
            exit("data base not connect please check ...");
        }
      $user=  R::findOne("user_roles",'id= ?',array($this->getId()));

      if(count($user)!=0) {
          R::trash($user);
          echo "delete is done ";
      }else {
          echo "cannot delete becase the record is not exist ";
      }

    }

    public function delete_user_role_All_records()
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




function update ()

{

    if(!R::testConnection()){
        exit("data base not connect please check ...");
    }


    R::ext('xdispense', function ($table_name){
        return R::getRedBean()->dispense($table_name)  ;
    });

    $users_roles= R::xdispense('user_roles');

$role_ob=  R::load('user_roles',$this->getId());
 if($role_ob->getId()!=0){
     // will never come to this code unless the id is exist -
    echo "just true ";
     $users_roles->role_number=$this->getRoleNumber();
     $users_roles->role_name=$this->getRoleName();
     $users_roles->id=$this->getId();
      R::store($users_roles); //

 }else {
     echo "cannot update becuase the user id not exist";
 }

}
    function create() {

    if(!R::testConnection()){
        exit("data base not connect please check ...");
    }

     R::ext('xdispense', function ($table_name){
       return R::getRedBean()->dispense($table_name)  ;
     });

        $users_roles= R::xdispense('user_roles');



        $users_roles->role_number=$this->getRoleNumber();
        $users_roles->role_name=$this->getRoleName();

        $id_redbean_user_role_id=  R::store($users_roles); // store is done
        if($id_redbean_user_role_id>0){

        }else {
            echo "the data cannot be inserted in the table user_role  table ...";
        }
    }















   function load ($id,$table) {
       $user_role_object = R::load( $table, $id );
        if(count($user_role_object)==1){

            return null;
       }else if(count($user_role_object)>1){

            return $user_role_object;
        }




   }









}