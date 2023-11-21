<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
      <?php
        $count = 0;
        if(isset($_SESSION['cart'])) {
          $count = count($_SESSION['cart']);
        }
      ?>
      <a href="mycart.php" class="btn btn-outline-success">My Cart (<?php echo $count; ?>)</a>
      <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
  </div>
</nav>

</body>
</html>



<?php
}else{
     header("Location: index1.php");
     exit();
}
 ?>

