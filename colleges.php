<?php
require_once ('scripts\RedBeanPHP\rb.php');
class colleges
{


    public function __construct()
    {


        if (!R::testConnection()) {
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
           return  R::exec(" UPDATE `colleges` SET `name` = '$name'  WHERE `colleges`.`id` = ".$id);
        } else {
            return R::exec("INSERT INTO `colleges` ( `name`) VALUES ('$name')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::load('colleges',$id);
        }else {
            echo "empty id ";
        }

    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM colleges' );



    }

    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `colleges` WHERE id =".$id );
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `colleges` ");

    }

}