<?php
include_once("4_configdb.php");

$result = mysqli_query($mysqli, "select p.id, p.name, p.photo, p.qty, p.price, i.name as importir_name from produk_tb p join importir_tb i on p.importir_id = i.id");
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
  <style>
  .ellipsis {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
  </style>
</head>
<body>
<div id="app">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">TOKO SEPEDA</a>
    <form class="form-inline">
      <a href="4_add_importir.php" class="btn btn-outline-success my-2 my-sm-0">ADD IMPORTIR</a>
      <a href="4_add_produk.php" class="btn btn-outline-info my-2 my-sm-0 ml-2">ADD PRODUK</a>
    </form>
  </nav>
  <div class="container-fluid">
    <div class="row">
    <?php
            foreach ($result as $dt) { ?>
        <div class="col-md-3 col-sm-3 ">
          <div class="card mb-3" style="width: 18rem;">
              <img v-if="produk.photo" src="<?=$dt['photo']?>" class="card-img-top" alt="...">
              <div class="card-body">
              <div class="row">
                <div class="col-sm-5">
                <span class="ellipsis"><?=$dt['name']?></span>
                </div>
                <div class="col-sm-5">
                <span class="ellipsis"><?=$dt['importir_name']?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                <span class="badge badge-success">Rp. <?=$dt['price']?></span>
                </div>
                <div class="col-sm-5">
                <span class="badge badge-info">qty: <?=$dt['qty']?></span>
                </div>
              </div>
              
              
              
              </div>
              <a class="btn btn-info" href="4_detail_produk.php?id=<?=$dt['id']?>">Detail</a>
          </div>
        </div>
     <?php  }
      ?>
    </div>


  </div>

</div>
    
<script>
  // var app = new Vue({
  //   el: '#app',
  //   data: {
  //     message: 'Hello Vue!',
  //     produks: [],
  //   },
  //   methods: {
  //     showDetail: function(id){
  //       console.log(id)
  //       // axios.get("/get_detail_produk/3")
  //       // .then(res => console.log(res.data))
  //       // detailProduk = 
  //     }
  //   }
  //   ,created(){
  //     dataProduk = <?php echo json_encode(get_all_produk()); ?>;
  //     this.produks= dataProduk
  //     console.log(this.produks)
     
  //   }
  // })
</script>
</body>
</html>
