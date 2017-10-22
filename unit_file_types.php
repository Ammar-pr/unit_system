<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 11:02 م
 */

class unit_file_types
{
    public  function __construct()
    {


        if (!R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');


        }

    }

    public function Save($id, $extension,$unit_id)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec(" UPDATE `unit_file_type` SET `unit_id` = '$unit_id', `extension` = '$extension' WHERE `unit_file_type`.`id` = '$id'");
        } else {
            R::exec("INSERT INTO `unit_file_type` (`id`, `unit_id`, `extension`) VALUES (NULL, NULL, '$extension')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::exec("SELECT * FROM `unit_file_type` WHERE id='$id'");
        }

    }

    public function fetchAll()
    {


        R::exec("SELECT * FROM `unit_file_type`");


    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `unit_file_type` WHERE id ='$id' ");
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `unit_file_type` ");

    }

}