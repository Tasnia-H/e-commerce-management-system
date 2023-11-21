<?php
session_start();
require_once "test_conn.php";

// Fetch product details for the cart
$cart_products = array();
$total_amount = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $item) {
        // Fetch product details from the database based on $item['product_id']
        $query = "SELECT * FROM product WHERE prod_id = $product_id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            $product['quantity'] = $item['quantity'];
            $product['total'] = $product['prod_price'] * $item['quantity'];
            $cart_products[] = $product;
            $total_amount += $product['total'];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Your Online Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="images\0.png" alt="Your Logo" width="75" height="24"> Your Online Store
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="my-5">
    <div class="container">
        <h2>Checkout</h2>
        <form action="process_payment.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_products as $product) { ?>
                        <tr>
                            <td><?php echo $product['prod_name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>$<?php echo $product['prod_price']; ?></td>
                            <td>$<?php echo $product['total']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h4>Total Amount: $<?php echo $total_amount; ?></h4> <!-- Display total amount -->
            
            <!-- Customer Information Section -->
            <h3>Customer Information</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <!-- Add more customer information fields as needed -->

            <!-- Payment Method Section -->
            <h3>Payment Method</h3>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Select Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="" selected disabled>Select a payment method</option>
                    <option value="online">Online</option>
                    <option value="cod">Cash on Delivery</option>
                    <!-- Add more payment methods as needed -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Complete Payment</button>
        </form>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
