<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 09:50 م
 */
require_once 'scripts/RedBeanPHP/rb.php';







$con=mysqli_connect("localhost","root","dwddwddwd","unit");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"unit");

// ...some PHP code for database "test"...
    R::setup('mysql:host=' . localhost . ';dbname=' . 'unit', 'root', 'dwddwdwd');

mysqli_close($con);



?>

