<?php


require_once 'uqu/db/DatabaseManager.php';
class users_roles
{


    public function __construct()
    {


            if( !R::testConnection()) {
                R::setup('mysql:host=localhost;dbname=unit',
                    'root', 'dwddwddwd');


            }

    }



    public function Save($id, $name, $role_number)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec(" UPDATE `user_roles` SET `role_name` = '$name', `role_number` = '$role_number'  WHERE `user_roles`.`id` = '$id'");
        } else {
            R::exec("INSERT INTO `user_roles` (`id`, `role_name`, `role_number`) VALUES (NULL, '$name', '$role_number')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::exec("SELECT * FROM `user_roles` WHERE id='$id'");
        }

    }

    public function fetchAll()
    {


        R::exec("SELECT * FROM `user_roles`");


    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `user_roles` WHERE id ='$id' ");
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `user_roles` ");

    }

}