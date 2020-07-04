<?php
// include database connection file
include_once("4_configdb.php");
    $id = $_GET['id'];

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        print_r($_POST);
        echo $id;
        $query = "UPDATE importir_tb SET name = '$name', address= '$address', phone = '$phone' WHERE importir_tb.id = $id";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header('Location: 4_add_importir.php');
        } else {
            header('Location: 4_add_importir.php');
        }
    }
?>

<?php

$data_importir = mysqli_query($mysqli, "select * from importir_tb where importir_tb.id = $id");
$data_importir = mysqli_fetch_all($data_importir, MYSQLI_ASSOC)[0];
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <title>Soal No 4</title>
</head>
<body>
<div id="app">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
    <form name="update_user" method="post" action="4_edit_importir.php?id=<?=$data_importir['id']?>">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value="<?=$data_importir['name']?>"></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="address"  value="<?=$data_importir['address']?>"></td>
            </tr>
            <tr> 
                <td>Telepon</td>
                <td><input type="text" name="phone"  value="<?=$data_importir['phone']?>"></td>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <input class="btn btn-info" type="submit" name="submit" >
    </form>
    <a class="btn btn-success" href="4_add_importir.php">Back To Data Importir</a>
    </div>
    </div>
    


  </div>

</div>

</body>
</html>
