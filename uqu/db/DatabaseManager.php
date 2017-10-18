<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 09:50 م
 */
require_once 'scripts/RedBeanPHP/rb.php';





class DatabaseManager {



    public function getConnection (){


        try {

           if( !R::testConnection())
               R::setup( 'mysql:host=localhost;dbname=dsr_amnatto',
                   'dsr_amnatto', 'mVNeKCEG]b@W' );

        }catch (\RedBeanPHP\RedException $rd)
        {
            $rd->getMessage();
        }


    }
}



$db=new DatabaseManager;
$db->getConnection();


?>

