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
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
</head>


<body>
    <?php 
    include "layout/header.html";
    ?>
    
<main class="flex-shrink-0" id="body">
  <div class="container">
    <h1 class="mt-5 text-white text-center">Welcome to We Pict</h1>
    <p class="lead text-white text-center">Please Sign In if you are already registered. <code class="small text-warning">If you don't have an account, please register,</code> On <code class="small text-warning">which are available &gt; page</code>.</p>
  </div>
  <div class="text-center">
    <a href="login.php" class="btn btn-outline-light btn-lg rounded-pill">Sign in</a>
    <a href="register.php" class="btn btn-outline-light btn-lg rounded-pill">Sign up</a>
  </div>
</main>


    <?php 
    include "layout/footer.html";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>