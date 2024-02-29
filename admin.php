<?php
include "koneksi.php";
session_start();

if (isset($_GET['fotoid'])) {
    // echo "<script>
    //           alert('tombol like ditekan');
    //           location.href='admin.php';
    //           </script>";
  
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];
    //Cek apakah user sudah pernah like foto ini apa belum
  
    $sql = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");
  
    if (mysqli_num_rows($sql) == 1) {
      //User sudah pernah like foto ini
      header("location:admin.php");
    } else {
      $tanggallike = date("Y-m-d");
      mysqli_query($conn, "insert into likefoto values('','$fotoid','$userid','$tanggallike')");
      header("location:admin.php");
    }
  }

if (isset($_POST['logout'])) {
   session_unset();
   session_destroy();
   echo "<script>
   alert('logout success, see you again ');
   location.href='index.php';
 </script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>we\pict</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Monoton&family=Pacifico&display=swap" rel="stylesheet">
  </head>

<body>
    <?php 
    include "layout/headeradmin.html";
    ?>
    
    <main class="flex-shrink-0">
  <div class="container">
    <h2 class="mt-2 text-center text-white">Welcome To We Pict <?= $_SESSION['namalengkap'] ?> </h2>
    <hr class="text-white">
    <div class="row justify-content-center">
      <?php
      $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
      while ($data = mysqli_fetch_array($sql)) {
      ?>
        <div class="col-sm-2 my-4 justify-content-center">
          <div class="text-center">
            <img class="rounded shadow-lg" src="gambar/<?= $data['lokasifile'] ?>" alt="foto" width="200px">
          </div>     
          <div class="text-center text-white">
              <h5><?= $data['judulfoto'] ?></h5>
              <i><?= $data['deskripsifoto'] ?></i>
              <hr>
                <p>Upload by <?= $data['namalengkap'] ?></p>
          </div> 
          <div class="text-center">
                <?php
                $fotoid = $data['fotoid'];
                $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                $sql3 = mysqli_query($conn, "select * from komentarfoto where fotoid='$fotoid'");
                ?>
                <a href="admin.php?fotoid=<?= $data['fotoid'] ?>"><button type="button" class="btn btn-outline-light">like (<?= mysqli_num_rows($sql2) ?>)</button></a>
                <a href="komentar.php?fotoid=<?= $data['fotoid'] ?>"><button type="button" class="btn btn-outline-light">comment (<?= mysqli_num_rows($sql3) ?>)</button></a>
            </div>
        </div>
      <?php
        }
      ?>
    </div>
    </div>
  </div>
  </div>
  </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>