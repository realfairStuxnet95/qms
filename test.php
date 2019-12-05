<?php 
require 'classes_loader.php';

$training_id=6;
$pc_id=238;
$change_status=$upload->changeComputerStatus($pc_id,$training_id);
var_dump($change_status);
?>