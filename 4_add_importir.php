<?php
// include database connection file
include_once("4_configdb.php");


    // Check If form submitted, insert form data into users table.
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $query = "INSERT INTO importir_tb (name, address, phone) VALUES('$name', '$address', '$phone')";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            header('Location: 4_add_importir.php');
        } else {
            header('Location: 4_add_importir.php');
        }
    }
?>

<?php

$data_importir = mysqli_query($mysqli, "select * from importir_tb");
$data_importir = mysqli_fetch_all($data_importir, MYSQLI_ASSOC);
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
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <form name="update_user" method="post" action="4_add_importir.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" ></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="address" ></td>
            </tr>
            <tr> 
                <td>Telepon</td>
                <td><input type="text" name="phone" ></td>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <input class="btn btn-info" type="submit" name="submit" >
    </form>
    <a class="btn btn-success" href="4.php">Back To Home</a>
    </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">  
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($data_importir as $dt) {?>
                <tr>
                    <td><?=$dt['name']?></td>
                    <td><?=$dt['address']?></td>
                    <td><?=$dt['phone']?></td>
                    <td><a href="4_edit_importir.php?id=<?=$dt['id']?>" style="cursor:pointer" class="badge badge-info mr-2">EDIT</a><a href="4_delete_importir.php?id=<?=$dt['id']?>" style="cursor:pointer" class="badge badge-danger">DELETE</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>


  </div>

</div>

</body>
</html>
