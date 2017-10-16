<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:54 ص
 */
require_once 'uqu/db/DatabaseManager.php';
require_once 'colleges_departments.php';
class test
{


     public function test_update_colleges_department(){
     $te_object= new  colleges_departments('1','1','computr_eng');

         $te_object->update();

             }




}
$te= new test;
$te->test_update_colleges_department();

