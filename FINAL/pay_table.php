<?php
session_start();
include "test_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Confirm"])){
      if(isset($_POST['payment_method']) && isset($_SESSION['id']) && isset($_POST['total_amount']) ){

            $i = $_SESSION['id'];
            $pm = $_POST['payment_method'];
            $ta = $_POST['total_amount'];

            // echo"$pm";
            if($pm=="online"){         
                $redirectUrl = "online.php?id=" . urlencode($i) . "&payment_method=" . urlencode($pm) . "&total_amount=" . urlencode($ta);
                header("Location: $redirectUrl");
                }
                else {

          $sql = " select invoice_num , total_price  from checkout_cart where id = '$i' order by invoice_num desc limit 1  ";
          $result = mysqli_query($conn , $sql);
          $row = mysqli_fetch_assoc($result) ;
          $invoice_num = $row["invoice_num"]  ; 
          $tp = $row["total_price"];
          
          $sql_insert = " INSERT INTO payment ( payment_id , invoice_num ,  amount ,  payment_method ) VALUES ('$i','$invoice_num ','$tp','$pm')     ";
          $result_sqlinsert =   mysqli_query($conn , $sql_insert);
          
          if ($result_sqlinsert ){
               echo "Your order has been confirmed" ;
               unset($_SESSION['cart']);
               
          }
          }
      }


    }
    
?>