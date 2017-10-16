<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 09:50 م
 */
require_once 'scripts/RedBeanPHP5Beta/rb.php';
class DatabaseManager
{




    public function __construct()
    {

       $this->getConnection();

    }

    public function getConnection() {





            R::setup( 'mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd' );




        $isConnected = R::testConnection();


         return $isConnected;

    }

}


$db=new DatabaseManager;
?>