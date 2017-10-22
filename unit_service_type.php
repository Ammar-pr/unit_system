<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 12:45 ص
 */

class unit_service_type
{





    public function __construct()
    {


        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');


        }

    }

    public function Save($id, $name, $description)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec(" UPDATE `unit_service_type` SET `name` = '$name', `description` = '$description'  WHERE `unit_service_type`.`id` = '$id'");
        } else {
            R::exec("INSERT INTO `unit_service_type` (`id`, `name`, `description`) VALUES (NULL, '$name', '$description')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::exec("SELECT * FROM `unit_service_type` WHERE id='$id'");
        }

    }

    public function fetchAll()
    {


        R::exec("SELECT * FROM `unit_service_type`");


    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `unit_service_type` WHERE id ='$id' ");
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `unit_service_type` ");

    }

}