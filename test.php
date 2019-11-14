<?php 
require 'classes_loader.php';

$training_id=5;
$pc_id=$upload->getFreeTable($training_id);
var_dump($pc_id);
?>