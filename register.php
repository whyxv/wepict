<?php 
include "koneksi.php";

if (isset($_POST['register'])) {
$email = $_POST ['email'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$namalengkap = $_POST ['namalengkap'];
$alamat = $_POST ['alamat'];

echo $email." ".$username." ".$password." ".$namalengkap." ".$alamat;

$sql=mysqli_query($conn,"insert into user values('','$username','$password','$email','$namalengkap','$alamat')");

header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>we\pict</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>

<body>
    <?php 
    include "layout/header.html";
    ?>
    
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 mt-4">
     <h2 class="text-light mb-4 text-center">Create An Account</h2>
     <form action="register.php" method="POST">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label text-white">Email :</label>
    <input type="email" class="form-control rounded-pill" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label text-white">Username :</label>
    <input type="username" class="form-control rounded-pill" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label text-white">Password :</label>
    <input type="password" class="form-control rounded-pill" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="namalengkap" class="form-label text-white">Fullname :</label>
    <input type="namalengkap" class="form-control rounded-pill" id="namalengakp" name="namalengkap">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label text-white">Adress :</label>
    <input type="alamat" class="form-control rounded-pill" id="alamat" name="alamat">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" name="register">Sign up</button>
  </div>
</form>
    </div>
      </div>
    </main>

    <?php 
    include "layout/footer.html";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>