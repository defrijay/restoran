<?php

include "config1.php";

$id_prov = $_GET["id_prov"];
// select query dengan provinsi yang sudah di select
$sql = "SELECT * FROM regencies WHERE province_id = '$id_prov'";
$query = $mysqli->query($sql);
$data = [];

// pengulangan setiap rownya

while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
    // masukkan id dan nama ke array data
    $data[] = ["id_kab" => $row["id"], "nama" => $row["name"]];
    ;
}

echo json_encode($data);
