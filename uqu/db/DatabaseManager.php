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
echo "sdfd";
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