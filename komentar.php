<?php
include "koneksi.php";
session_start();

if (isset($_GET['fotoid'])) {
  $fotoid = $_GET['fotoid'];
  $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
  while ($data = mysqli_fetch_array($sql)) {
    $userid2 = $_SESSION['userid'];
    $usernama2 = $_SESSION['namalengkap'];
    $fotoid2 = $data['fotoid'];
    $judulfoto2 = $data['judulfoto'];
    $deskripsifoto2 = $data['deskripsifoto'];
    $lokasi = $data['lokasifile'];
  }
}

if (isset($_POST['komentar'])) {
  $fotoid = $_POST['fotoid'];
  $isikomentar = $_POST['isikomentar'];
  $tanggalkomentar = date("Y-m-d");
  $userid = $_SESSION['userid'];

  $sql = mysqli_query($conn, "insert into komentarfoto values('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

  header("location:komentar.php?fotoid=$fotoid");
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
  </head>

<body>
    <?php 
    include "layout/headeradmin.html";
    ?>
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="text-center text-white">Picture</h1>
    <hr class="text-white">
    <div class="row justify-content-start">
      <div class="col-sm-3">
        <img src="gambar/<?= $lokasi ?>" alt="foto" class="img-thumbnail" height="100px">
      </div>
      <div class="col-sm-9 bg-light bg-gradient rounded-4">
        <h3 class="text-black mt-3">Comment:</h3>
        <?php
        $userid = $_SESSION['userid'];
        $sql = mysqli_query($conn, "SELECT * from komentarfoto,user where komentarfoto.userid=user.userid AND komentarfoto.fotoid='$fotoid2'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
          <div class="text-black">
            <div>
              <p> <?= $data['tanggalkomentar'] ?> <strong><?= $data['namalengkap'] ?> :</strong> <i> <?= $data['isikomentar'] ?> </i> </p>
            </div>
          </div>
        <?php
        }
        ?>
        <div>
          <div>
            <p> <strong><?= $userid2 ?> <?= $usernama2 ?> :</strong> <i>
                <form action="komentar.php" method="post">
                  <input type="text" name="fotoid" value="<?= $fotoid2 ?>" hidden>
                  <input type="text" name="isikomentar" id="isikomentar">
                  <input type="submit" value="komentar" name="komentar" class="btn btn-dark btn-sm">
                </form>
              </i> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
    
    <?php 
    include "layout/footer.html";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>