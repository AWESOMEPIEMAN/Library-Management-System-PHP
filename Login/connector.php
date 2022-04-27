<?php 

$dbhost = "it.nct.edu.om";
$dbuser = "22a13";
$dbpass = "99874";
$dbname = "db22a13";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname))
{
    die("Failed to connect to DB");
}

