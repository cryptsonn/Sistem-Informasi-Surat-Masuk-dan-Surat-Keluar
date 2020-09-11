<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "surat";

$db = mysqli_connect($server, $user, $password, $db);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>