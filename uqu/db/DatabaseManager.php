<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 09:50 م
 */
require_once '../../scripts/RedBeanPHP5Beta/rb.php';
class DatabaseManager
{

    private  $user='root';
    private $password='dwddwddwd';
    private $dbName='mysql:host=localhost;dbname=unit';



    public function __construct()
    {

      $this->getConnection();

    }

    public function getConnection() {



        if (R::testConnection() != 1) {

            R::setup( '$this->$dbName',
                '$this->$user', '$this->$password' );

           return  R::testConnection();



        }



    }

}

?>