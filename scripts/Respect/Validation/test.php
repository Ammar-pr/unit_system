<?php

require_once 'Validator.php';
require_once 'Rules\AllOf.php';

$number = 123;
$vl=new Validator;
$vl->numericVal()->validate($number);



?>