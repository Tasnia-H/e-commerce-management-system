<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price($)</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                $itemTotal = $value['Price'] * $value['Quantity'];
                                $total += $itemTotal;
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[Item_name]</td>
                                    <td>$value[Price]</td>
                                    <td>
                                      
                                        
                                        <input class='text-center' type='number' value='$value[Quantity]' min='1' max='10' onchange='updatePrice(this, $value[Price], $key)'>
                                        
                                    </td>
                                    <td id='item-total-$key'>$itemTotal</td>
                                    <td>
                                        <form action='remove_from_cart.php' method='POST'>
                                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                                            <input type='hidden' name='prod_name' value='$value[Item_name]'>
                                        </form>
                                    </td>
                                </tr>
                            ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4>Total Price($):</h4>
                    <h5 class="text-right" id="total-price"><?php echo $total ?></h5>
                    <br>
                    <form action = "pay_table.php" method="POST">
                        <div class="form-check">
                            <input class="form-check-input me 1" type="radio" name="payment_method" value="online" id="onlineRadio" checked>
                            <label class="form-check-label" for="onlineRadio">
                                Online Payment
                            </label>
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input me 1" type="radio" name="payment_method" value="cod" id="codRadio">
                            <label class="form-check-label" for="codRadio">
                                Cash On Delivery
                            </label>
                        </div>
                        <br>
                         <input type="hidden" name="total_amount" value=" <?php echo $total ?> " >
                         <button type="submit"  name = 'Confirm' class="btn btn-primary">Confirm</button>
                         <a class="btn btn-secondary" href="mycart.php" role="button">Cancel</a>
                 </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updatePrice(inputElement, itemPrice, key) {
            var newQuantity = inputElement.value;
            var newItemTotal = itemPrice * newQuantity;
            document.getElementById('item-total-' + key).textContent = newItemTotal;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            var total = 0;
            var itemTotalElements = document.querySelectorAll('[id^="item-total-"]');
            itemTotalElements.forEach(function(element) {
                total += parseFloat(element.textContent);
            });
            document.getElementById('total-price').textContent = total.toFixed(2);
        }
    </script>
</body>
</html>
