<?php
include_once("4_configdb.php");

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $importir_id = $_POST['importir_id'];
    
    $qty = $_POST['qty'];
    echo $qty;
    $photo = $_POST['photo_old'];
    $price = $_POST['price'];
    echo $photo;
    if ($_FILES['photo']['name']) {
        $res_upload = move_uploaded_file($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
        echo $res_upload;
        $photo = $_FILES['photo']['name'];
    }
    echo $photo;
    // die;
    $query = "UPDATE produk_tb SET name='$name', importir_id= $importir_id , qty= $qty, price=$price, photo='$photo' WHERE produk_tb.id = $id";
    $result = mysqli_query($mysqli, $query);
    // echo $result;
    // die;

    // Redirect to homepage to display updated user in list
    header("Location: 4_detail_produk.php?id=$id");
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "select p.id, p.name, p.photo, p.qty, p.price,p.importir_id, i.name as importir_name, i.address, i.phone from produk_tb p join importir_tb i on p.importir_id = i.id where p.id = $id");
$result = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

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
    <form class="form" name="update_user" method="post" action="4_edit_produk.php?id=<?=$result['id'];?>" enctype="multipart/form-data">
        
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?=$result['name'];?>"></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="text" name="qty" value="<?=$result['qty'];?>"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="price" value="<?=$result['price'];?>"></td>
            </tr>
            <tr> 
                <td>produsen</td>
                <td>
                    <select name="importir_id" id="">
                        <?php foreach ($data_importir as $dt) {?>
                            <option value="<?=$dt['id']?>" <?=($dt['id'] == $result['importir_id'])? 'selected':''?> ><?=$dt['name'];?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>foto</td>
                <td><input type="file" name="photo"><br><?=$result['photo']?></td>
                <input type="hidden" name="photo_old" value="<?=$result['photo']?>">
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <input type="hidden" name="id" value=<?=$result['id'];?>>
    <input class="btn btn-info" type="submit" name="update" value="Update">
    </form>
    <a class="btn btn-danger" href="4_edit_produk">delete</a>
    <a class="btn btn-success" href="4_detail_produk.php?id=<?=$result['id'];?>">Back To Detail</a>
    </div>
    </div>
    


  </div>

</div>

</body>
</html>
