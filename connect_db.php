<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 23/10/17
 * Time: 06:50 ص
 */

class connect_db
{


public function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "dwddwddwd";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=unit", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}




}

$co=new connect_db();
$co->connect();