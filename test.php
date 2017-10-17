<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:54 ص
 */
require_once 'uqu/db/DatabaseManager.php';
require_once 'colleges_departments.php';
require_once 'colleges.php';
class test
{


     public function test_update_colleges_department(){
         error_reporting(E_ALL);
         ini_set('display_errors', 1);
     $te_object= new  colleges('ssd');
        // $te_object->setCollegeId('1');


         $te_object->insert();
                  }




}
$te= new test;
$te->test_update_colleges_department();

