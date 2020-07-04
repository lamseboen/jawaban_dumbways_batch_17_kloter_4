<?php

include_once("4_configdb.php");
$id = $_GET['id'];
$query = "DELETE FROM produk_tb WHERE produk_tb.id = $id";
$result = mysqli_query($mysqli, $query);
echo $result;
if ($result) {
    header("Location: 4.php");
} else {
    header("Location: 4.php");
}
