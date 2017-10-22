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
            $colleges_departments_test =new users_roles ();

         $colleges_departments_test->Save('5','sdfdf','151');
                  }




}
$te= new test;
$te->test_update_colleges_department();

