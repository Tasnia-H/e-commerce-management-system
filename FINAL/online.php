<?php
session_start();
include "test_conn.php";


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $card_number = $_POST['card_number'];
        $expiry = $_POST['expiry'];
        $cvv = $_POST['cvv'];

        $errors = [];

        // Validate card number
        if (!preg_match('/^\d{16}$/', $card_number)) {
            $errors[] = "Invalid card number. Please enter a valid 16-digit card number.";
        }

        // Validate expiry date (MM/YY format)
        if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiry)) {
            $errors[] = "Invalid expiry date. Please enter a valid MM/YY format.";
        }

        // Validate CVV number
        if (!preg_match('/^\d{3,4}$/', $cvv)) {
            $errors[] = "Invalid CVV number. Please enter a valid 3 or 4-digit CVV number.";
        }

        // Check for errors
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } else {

            // Payment processing logic here
            // include "pay_table.php";
            // Redirect to thank you page
            if (isset($_GET['id'], $_GET['payment_method'], $_GET['total_amount'])) {
                $i = $_GET['id'];
                $pm = $_GET['payment_method'];
                $ta = $_GET['total_amount'];   // Now you can use $i, $pm, and $ta in your online.php logic
                $sql = " select invoice_num , total_price  from checkout_cart where id = '$i' order by invoice_num desc limit 1  ";
                $result = mysqli_query($conn , $sql);
                $row = mysqli_fetch_assoc($result) ;
                $invoice_num = $row["invoice_num"]  ; 
                $tp = $row["total_price"];
                // echo "$i','$invoice_num ','$tp','$pm";
                $sql_insert = " INSERT INTO payment ( payment_id , invoice_num ,  amount ,  payment_method ) VALUES ('$i','$invoice_num ','$tp','$pm')     ";
                $result_sqlinsert =   mysqli_query($conn , $sql_insert);
                if ($result_sqlinsert ){
                    // echo "Your order has been confirmed" ;
                    header("Location:thank_you.php");
                    unset($_SESSION['cart']);
                }     
          }
        }
        }
    
} else {
    header("Location: payment.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#1690A7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .payment-container {
            background-color:#eaecec;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Enter Your Card Details</h2>
        <form action="" method="post">
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>
            <label for="expiry">Expiry Date</label>
            <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
            <label for="cvv">CVV</label>
            <input type="number" id="cvv" name="cvv" placeholder="123" required>
            <button type="submit" class="baby">Pay Now</button>
        </form>
    </div>
</body>
</html>
