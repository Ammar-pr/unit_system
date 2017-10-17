<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 04:13 م
 */
require_once 'scripts/RedBeanPHP5Beta/RedBean_IBeanFormatter.php';

class MyTableFormatter implements RedBean_IBeanFormatter{
    public function formatBeanTable($table) {
        return $table;
        }
    public function formatBeanID( $table ) {
        if ($table=="colleges_departments") return "id";

    }
}
R::$writer = new AQueryWriter( R::$adapter );
R::$writer->tableFormatter = new MyTableFormatter;
?>