<?php
include_once("4_configdb.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "select p.id, p.name, p.photo, p.qty, p.price, i.name as importir_name, i.address, i.phone from produk_tb p join importir_tb i on p.importir_id = i.id where p.id = $id");
$result = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
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
      <table class="table">
        <tr>
          <td colspan="2"><img src="<?=$result['photo']?>" alt="<?=$result['photo']?>"></td>
        </tr>
        <tr>
          <th>Name</th>
          <td><?=$result['name']?></td>
        </tr>
        <tr>
          <th>Price</th>
          <td><?=$result['price']?></td>
        </tr>
        <tr>
          <th>Jumlah</th>
          <td><?=$result['qty']?></td>
        </tr>
        <tr>
          <th>Importir</th>
          <td><?=$result['importir_name']?></td>
        </tr>
        <tr>
          <th>Address</th>
          <td><?=$result['address']?></td>
        </tr>
        <tr>
          <th>phone</th>
          <td><?=$result['phone']?></td>
        </tr>
        <tr>
          <th>Jumlah</th>
          <td><?=$result['qty']?></td>
        </tr>
      </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <a class="btn btn-info" href="4_edit_produk.php?id=<?=$result['id']?>">edit</a>
    <a class="btn btn-danger" href="4_delete_produk.php?id=<?=$result['id']?>" onclick="return confirm('yakin?')">delete</a>
    <a class="btn btn-success" href="4.php">Back To Home</a>
    </div>
    </div>
    


  </div>

</div>

</body>
</html>
