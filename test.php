<?php 
require 'classes_loader.php';

$email="1";
$password="police2016";
$check_mail=$admin->checkUserPassword($email,$password);
var_dump($check_mail);
?>