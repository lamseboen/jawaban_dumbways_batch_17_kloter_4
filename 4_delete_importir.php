<?php

include_once("4_configdb.php");
$id = $_GET['id'];
$query = "DELETE FROM importir_tb WHERE importir_tb.id = $id";
$result = mysqli_query($mysqli, $query);
echo $result;
if ($result) {
    header("Location: 4_add_importir.php");
} else {
    header("Location: 4_add_importir.php");
}
