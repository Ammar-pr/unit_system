<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 02:40 م
 */
require_once ('scripts\RedBeanPHP\rb.php');
class colleges_departments
{

   public function __construct()
    {


        if (!R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');


        }

    }

    public function Save($id, $department_name,$college_id)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec(" UPDATE `colleges_departments` SET `college_id` = $college_id, `department_name` = '$department_name' WHERE `colleges_departments`.`id` =".$id);
            return $id;
        } else {
            R::exec("INSERT INTO `colleges_departments` ( `college_id`, `department_name`) VALUES ( $college_id, '$department_name')");
        }

    }

    public function fetchWithPK($id)
    {


        if ($id > 0) {
            return R::load('colleges_departments',$id);
        }else {
            echo "the id is empty";
        }

    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM `colleges_departments` ' );



    }


    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `colleges_departments` WHERE id =".$id );
        }else {
            echo "the id is empty";
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `colleges_departments` ");

    }

}