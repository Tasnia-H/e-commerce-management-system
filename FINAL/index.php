<?php
include("header.php");


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>
                          <!DOCTYPE html>
                          <html>
                          <head>
                              <title>Index</title>
                              <meta charset="utf-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1">
                              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
                          </head>
                          <body>




                          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active" data-bs-interval="1000">
                                <img src="images\c1.jpg" class="d-block w-100" alt="Carousel Image 1" height="450">
                              </div>
                              <div class="carousel-item" data-bs-interval="1000">
                                <img src="images\c2.jpg" class="d-block w-100" alt="Carousel Image 2" height="450">
                              </div>
                              <div class="carousel-item">
                                <img src="images\c3.jpg" class="d-block w-100" alt="Carousel Image 3" height="450">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>




                          <section class="my-5">
                            <div class="py-5">
                              <h2 class="text-center">Our Products</h2>
                            </div>
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\tv1.jpg" class="card-img-top" alt="TV Model X" height="300">
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
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\freezer1.jpg" class="card-img-top" alt="Freezer Model G" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model G</h5>
                                        <p class="card-text">Price: $850</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model G">
                                        <input type="hidden" name="price" value="850">
                                        <input type="hidden" name="prod_id" value="6">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\ac1.png" class="card-img-top" alt="AC Model A" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model A</h5>
                                        <p class="card-text">Price: $500</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model A">
                                        <input type="hidden" name="price" value="500">
                                        <input type="hidden" name="prod_id" value="1">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\ac2.jpg" class="card-img-top" alt="AC Model B" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model B</h5>
                                        <p class="card-text">Price: $550</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model B">
                                        <input type="hidden" name="price" value="550">
                                        <input type="hidden" name="prod_id" value="4">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\tv2.jpg" class="card-img-top" alt="TV Model Y" height="300">
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
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\freezer2.jpg" class="card-img-top" alt="Freezer Model H" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model H</h5>
                                        <p class="card-text">Price: $820</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model H">
                                        <input type="hidden" name="price" value="820">
                                        <input type="hidden" name="prod_id" value="8">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\freezer3.jpg" class="card-img-top" alt="Freezer Model I" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model I</h5>
                                        <p class="card-text">Price: $830</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model I">
                                        <input type="hidden" name="price" value="830">
                                        <input type="hidden" name="prod_id" value="9">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                  <form action="add_to_cart.php" method="POST">
                                    <div class="card">
                                      <img src="images\ac3.png" class="card-img-top" alt="AC Model C" height="300">
                                      <div class="card-body">
                                        <h5 class="card-title">Model C</h5>
                                        <p class="card-text">Price: $520</p>
                                        <button type ="submit" name="add_to_cart" class="btn btn-info">Add To Cart</button>
                                        <input type="hidden" name="prod_name" value="Model C">
                                        <input type="hidden" name="price" value="520">
                                        <input type="hidden" name="prod_id" value="7">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </section>

                          <div class="py-5">
                            <h2></h2>
                          </div>
                          <div class="row" style="background-color: #e3f2fd;">
                            <h2 class="text-center">
                              <img src="images\0.png" alt="Bootstrap" width="75" height="35">  Electronics<br><br>
                            </h2>
                            <div class="col-sm-4">
                              <img src="images\location.png" alt="Location" width="40" height="24">
                              <h5 class="card-title">Our Store Location</h5>
                              <p class="card-text">66 Mohakhali<br>
                                                    Dhaka 1212<br>
                                                    Bangladesh</p>
                            </div>
                            <div class="col-sm-4">
                              <img src="images\contact.png" alt="Contact" width="40" height="24">
                              <h5 class="card-title">Contact Us</h5>
                              <p class="card-text">Mobile No.: 01708812609<br>
                                                  Phone: +880-2-222264051- 4 (PABX)<br>
                                                  Fax: +880-2-58810383<br>
                                                  E-mails: info@bracu.ac.bd
                              </p>
                            </div>
                            <div class="col-sm-4">
                              <img src="images\hours.png" alt="Hours" width="40" height="24">
                              <h5 class="card-title">Office Hours</h5>
                              <p class="card-text">9am to 4pm<br>
                              </p>
                            </div>
                          </div>

                          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
                          </body>
                        </html>

<?php
}else{
     header("Location: index1.php");
     exit();
}
 ?>

