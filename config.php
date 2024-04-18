<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'mamemam';

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
 }

?>
