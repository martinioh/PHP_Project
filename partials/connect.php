<?php

$con = new mysqli("localhost", "root", "", "ecommercewebsite");

if(!$con){
    die(mysqli_error());
}

?>