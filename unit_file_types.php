<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 11:02 م
 */
require_once ('scripts\RedBeanPHP\rb.php');
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
            R::exec(" UPDATE `unitfiletype` SET `unit_id` = '$unit_id', `extension` = '$extension' WHERE `unit_file_type`.`id` = $id");
           return $id;
        } else {
            R::exec("INSERT INTO `unitfiletype` (`id`, `unit_id`, `extension`) VALUES (NULL, NULL, '$extension')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::load('unitfiletype',$id);
        }

    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM unitfiletype' );



    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `unitfiletype` WHERE id =$id ");
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `unitfiletype` ");

    }

}