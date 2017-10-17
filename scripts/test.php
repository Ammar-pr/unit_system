<?php


use Respect\Validation\Validator as v;

$usernameValidator = v::alnum()->noWhitespace()->length(1,15);
$usernameValidator->validate('alganet'); // true



?>