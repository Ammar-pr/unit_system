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



    function __construct($role_number,$role_name,$id) {
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





    public  function get_user_role_object()
    {

        // to check specfic depratment for any clolleges
        try {
            $row = R::getAll("SELECT * FROM usersroles where id='".$this->getId()."'");
            R::convertToBeans( 'user', $row );
            if(count($row)>0){

                return $row;
            }else {

                return null;
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }

    public function delete_user_role_object() {

        try {
            if(  R::exec( 'delete from  usersroles    WHERE id ="'.$this->getId().'" ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }
    public function delete_user_role_All_records() {

        try {
            if(  R::exec( 'delete  from  usersroles ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }


    function update(){

        try {
            $status= R::exec( 'update usersroles set role_number="'.$this->getRoleNumber().'" ,role_name= "'.$this->getRoleName().'"    where id="'.$this->getId().'" ' );
            if($status==0){
                echo "can't update the record ";
            }
            R::close();
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }


    }


    function insert() {
        $users_roles= R::dispense('usersroles');



        $users_roles->role_number=$this->getRoleNumber();
        $users_roles->role_name=$this->getRoleName();

        $id_redbean_user_role_id=  R::store($users_roles); // store is done
        if($id_redbean_user_role_id>0){

        }else {
            echo "the data cannot be inserted in the table user_role  table ...";
        }
    }




















}