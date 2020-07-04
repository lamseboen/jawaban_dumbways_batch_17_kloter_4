<?php
// include database connection file
include_once("4_configdb.php");


    // Check If form submitted, insert form data into users table.
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $importir_id = $_POST['importir_id'];
        $qty = $_POST['qty'];
        $photo = $_FILES['photo']['name'];
        $price = $_POST['price'];

        $res_upload = move_uploaded_file($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
        $query = "INSERT INTO produk_tb (name, importir_id, qty, photo,  price) VALUES('$name', $importir_id,$qty, '$photo', $price)";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            header('Location: 4.php');
        } else {
            header('Location: 4_add_produk.php');
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
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
    <form name="update_user" method="post" action="4_add_produk.php" enctype="multipart/form-data">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" ></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="number" name="qty" ></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="price" ></td>
            </tr>
            <tr> 
                <td>produsen</td>
                <td>
                    <select name="importir_id" id="">
                        <option value="">- pilih produsen -</option>
                        <?php foreach ($data_importir as $dt) {?>
                            <option value="<?=$dt['id']?>"><?=$dt['name'];?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>foto</td>
                <td><input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1"></td>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <input class="btn btn-info" type="submit" name="submit" >
    </form>
    <a class="btn btn-success" href="4.php">Back to Home</a>
    </div>
    </div>
    


  </div>

</div>

</body>
</html>
