<?php


require_once 'Respect/Validation/Validator.php';
require_once 'Respect/Validation/Rules/AllOf.php';
require_once 'Respect/Validation/Factory.php';
require_once 'Respect/Validation/Exceptions/ComponentException.php';
require_once 'Respect/Validation/Exceptions/ExceptionInterface.php';
use Respect\Validation\Validator as v;
$usernameValidator = v::alnum()->noWhitespace()->length(1,15);
$usernameValidator->validate('alganet'); // true



?>