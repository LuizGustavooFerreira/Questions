<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bd_quiz";

$conexao = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno())
    die("Error na conexão: " .mysqli_connect_error() . " (" . mysqli_connect_error() . ")");
?>