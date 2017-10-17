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
require_once 'unit_file_types.php';
require_once 'unit_service_type.php';
require_once 'unit_status.php';

class test
{


     public function test_update_colleges_department(){
         error_reporting(E_ALL);
         ini_set('display_errors', 1);
     $te_object= new  unit_status('ss','sss','asdasd a new request the status will change to open');
         $te_object->setId('1');
        // $te_object->setCollegeId('1');


         $te_object->delete_unit_status_object();

                  }




}
$te= new test;
$te->test_update_colleges_department();

