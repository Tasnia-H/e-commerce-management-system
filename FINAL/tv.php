<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="images\0.png" alt="Bootstrap" width="75" height="24">  Electronics
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tv.php">Television</a></li>
            <li><a class="dropdown-item" href="freezer.php">Freezer</a></li>
            <li><a class="dropdown-item" href="ac.php">AC</a></li>
          </ul>
        </li>
      </ul>
      <a class="btn btn-primary" href="cart.php" role="button"><img src="images\cart.png" alt="Bootstrap" width="40" height="25"></a>
    </div>
  </div>
</nav>

<section class="my-5">
  <div class="py-5">
    <h2 class="text-center">Our Televisions</h2>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
      <form action="add_to_cart.php" method="POST">
        <div class="card">
          <img src="images\tv1.jpg" class="card-img-top" alt="Bootstrap" height="300">
          <div class="card-body">
            <h5 class="card-title">Model X</h5>
            <p class="card-text">Price: $1000</p>
            <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
            <input type="hidden" name="prod_name" value="Model x">
            <input type="hidden" name="price" value="1000">
            <input type="hidden" name="prod_id" value="2">
          </div>
        </div>
      </form>
      </div>
        <div class="col-lg-4 col-md-4 col-12">
        <form action="add_to_cart.php" method="POST">
        <div class="card">
          <img src="images\tv2.jpg" class="card-img-top" alt="Bootstrap" height="300">
          
          <div class="card-body">
            <h5 class="card-title">Model Y</h5>
            <p class="card-text">Price: $1100</p>
            <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
            <input type="hidden" name="prod_name" value="Model Y">
            <input type="hidden" name="price" value="1100">
            <input type="hidden" name="prod_id" value="5">
          </div>
        </div>
       </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>