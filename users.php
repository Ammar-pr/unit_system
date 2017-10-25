<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 21/10/17
 * Time: 09:18 م
 */
require_once ('scripts\RedBeanPHP\rb.php');
class users
{
    public function __construct()
    {
        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');
        }
    }


    public function Save($id,$user_name,$user_job_number,$role_id,$department_id,$name,$password,$phonenumber_number)
    {


// $hashed_password= password_hash("$pasword", PASSWORD_DEFAULT);

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {


                return R::exec(" 
UPDATE `users` SET `user_job_number` =$user_job_number, `role_id` = $role_id ,`department_id` =$department_id, `name` = '$name', `password` = '$password', `phonenumber_number` = '$phonenumber_number', `email` = '$user_name' WHERE `users`.`id` =" .$id);

        } else {

            if(count (R::getAll( "SELECT * FROM users where user_name='$user_name' "  ))==1 ) {
                echo "الايميل موجود بالفعل حاول ان تدخل ايميل اخر او نسيان كلمة المرور للمساعدة ";
            }
            else {

                $hashed_password= password_hash("$password", PASSWORD_DEFAULT);
            R::exec("INSERT INTO `users` ( `user_job_number`, `role_id`, `department_id`, `name`, `password`, `phonenumber_number`, `email`) VALUES ( $user_job_number, $role_id, $department_id, '$name', '$hashed_password', '$phonenumber_number', '$user_name')");
        }}
    }
    public function fetchWithPK($id)
    {
        if ($id > 0) {
            return R::load('users',$id);
        }else {
            echo "the id is empty";
        }
    }
    public function fetchAll()
    {
        return R::getAll( 'SELECT * FROM users' );
    }



    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `users` WHERE id =".$id );
        }
    }
    public function deleteAll()
    {
        return R::exec("DELETE FROM `users` ");
    }


    public function login($email,$password) {

        $hashed_password= password_hash("$password", PASSWORD_DEFAULT);
        $user_data=R::getAll( "SELECT * FROM users where email='$email' & pssword='$hashed_password' " );
      if(count(user_data)>0){
        return true ;
      }else{
          return false ;
      }
    }




}
