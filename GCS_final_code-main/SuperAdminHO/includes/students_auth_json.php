<?php 
include 'auth.php';
$data = new admin;

print_r($data->selectAll_Students());
?>