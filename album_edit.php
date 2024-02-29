<?php
include "koneksi.php";
session_start();

if (isset($_GET['albumid'])) {
  $albumid = $_GET['albumid'];
  $sql = mysqli_query($conn, "select * from album where albumid='$albumid'");
}

if (isset($_POST['update'])) {
  $albumid = $_POST['albumid'];
  $namaalbum = $_POST['namaalbum'];
  $deskripsi = $_POST['deskripsi'];

  $sql = mysqli_query($conn, "UPDATE album set namaalbum='$namaalbum',deskripsi='$deskripsi' where albumid='$albumid'");
  echo "<script>
  alert('update album berhasil');
  location.href='album.php';
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
  </head>

<body>
    <?php 
    include "layout/headeradmin.html";
    ?>
<main class="flex-shrink-0">
  <div class="container text-white">
    <h1 class="mt-3"><?= $_SESSION['namalengkap'] ?>'s albums</h1>
    <hr>
    <div class="container">

      <div class="container mt-1 row justify-content-center text-white">
        <div class="col-sm-3">
          <h1 class="mt-2">Upload</h1>
          <form action="album_edit.php" method="POST">
            <?php
            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <input type="text" name="albumid" value="<?= $data['albumid'] ?>" hidden>
              <div class="mb-3 mt-3">
                <label for="namaalbum">Album Name</label>
                <input type="text" class="form-control" id="namaalbum" name="namaalbum" value="<?= $data['namaalbum'] ?>">
              </div>
              <div class="mb-3">
                <label for="deskripsi">Description</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="10"> <?= $data['deskripsi'] ?> </textarea>
              </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
          </form>
        </div>
        <div class="col-sm-8">
          <table class="table table-dark table-striped">
            <thead>
              <tr>
              <th>No</th>
                <th>Album Name</th>
                <th>Description</th>
                <th>Date Added</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $urut = 1;
              $userid = $_SESSION['userid'];
              $sql = mysqli_query($conn, "select * from album where userid='$userid'");
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <td><?= $urut++ ?></td>
                  <td><?= $data['namaalbum'] ?></td>
                  <td><?= $data['deskripsi'] ?></td>
                  <td><?= $data['tanggaldibuat'] ?></td>
                  <td>
                    <a href="album.php?albumid=<?= $data['albumid'] ?>" onclick="return confirm('Yakin menghapus data?')"><button type="button" class="btn btn-outline-light">Delete</button></a>
                    <a href="album_edit.php?albumid=<?= $data['albumid'] ?>"><button type="button" class="btn btn-outline-light">Edit</button></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>

          </table>
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