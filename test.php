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
require_once 'users_roles.php';

class test
{


     public function test_update_colleges_department(){
         error_reporting(E_ALL);
         ini_set('display_errors', 1);
     $te_object= new  users_roles('13','i sdf my ddddd','1');
         $te_object->setId('8');
        // $te_object->setCollegeId('1');


         $te_object->get_user_role_object();

                  }




}
$te= new test;
$te->test_update_colleges_department();

