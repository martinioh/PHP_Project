<?php
$ini = parse_ini_file('app.ini');
$con = new mysqli($ini['db_host'], $ini['db_user'], $ini['db_password'], $ini['db_name']);

if(!$con){
    die(mysqli_error());
}

?>