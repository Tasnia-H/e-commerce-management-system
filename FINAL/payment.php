<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment - Your Online Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #e3f2fd;">
<section class="my-5">
    <div class="py-5">
        <h4 class="text-left">Choose your payment method:</h4>
    </div>
    <form action="checkout.php" method="POST">
        <p>Total amount: $<?php echo $_SESSION['total_amount']; ?></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="payment_method" value="online" id="onlineRadio" checked>
                                <label class="form-check-label" for="onlineRadio">Online Payment</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="radio" name="payment_method" value="cod" id="codRadio">
                                <label class="form-check-label" for="codRadio">Cash on Delivery</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="total_amount" value="<?php echo $_SESSION['total_amount']; ?>">
        <button type="submit" class="btn btn-primary">Confirm</button>
        <a class="btn btn-secondary" href="cart.php" role="button">Cancel</a>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
