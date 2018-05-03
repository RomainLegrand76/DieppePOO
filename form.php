<?php
require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');


$test = new Formulaire("config");
$test->frmCheck();