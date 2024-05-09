<?php

$DB_HOST = "sql6.freesqldatabase.com";
$DB_USER = "sql6705174"; 
$DB_PASS = "jpJm1z4TZN"; 
$DB_NAME = "sql6705174";

$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

if (!$con)
{
    die( "Unable to select database");
}

?>
