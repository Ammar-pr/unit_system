<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:08 ص
 */
require_once ('scripts\RedBeanPHP\rb.php');
class unit_status
{
    public function __construct()
    {
        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');
        }
    }
    public function Save($id, $status_name, $status_code,$description)
    {
        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec(" UPDATE `unit_status` SET `status_name` = '$status_name', `status_code` = '$status_code' , `description` = '$description' WHERE `unit_status`.`id` = $id");
        } else {
            R::exec("INSERT INTO `unit_status` (`id`, `status_name`, `status_code`, `description`) VALUES (NULL, '$status_name', '$status_code','$description')");
        }
    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::load('unit_status',$id);
        }

    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM `unit_status` ' );



    }
    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `unit_status` WHERE id =$id ");
        }
    }
    public function deleteAll()
    {
        return R::exec("DELETE FROM `unit_status` ");
    }
}
