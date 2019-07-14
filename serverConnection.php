<?php


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'kaajsoft_ketabshar_MVP';
$url=$_SERVER['PHP_SELF'];


$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($dblink->connect_errno)
{
    printf("Failed to connect to database");
    exit();
}

$dblink->set_charset("utf8");



?>