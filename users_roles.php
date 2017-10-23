<?php

require_once ('scripts\RedBeanPHP\rb.php');
class users_roles
{


    public function __construct()
    {


            if( !R::testConnection()) {
                R::setup('mysql:host=localhost;dbname=unit',
                    'root', 'dwddwddwd');


            }

    }



    public function Save($id, $name)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
         return   R::exec(" UPDATE `user_roles` SET `role_name` = '$name'  WHERE `user_roles`.`id` =".$id);

        } else {
            return   R::exec("INSERT INTO `user_roles` ( `role_name`) VALUES ( '$name')");

        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
           return R::load('user_roles',$id);
        }else {
            echo "the id is empty";
        }

    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM user_roles' );



    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `user_roles` WHERE id =".$id );
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `user_roles` ");

    }

}


