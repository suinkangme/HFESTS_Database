<?php

$hostname = 'lac353.encs.concordia.ca';
$password = 'Ssist353';
$username = 'lac353_4';
$database = 'lac353_4';
$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("dead");
}
