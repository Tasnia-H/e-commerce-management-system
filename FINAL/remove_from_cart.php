<?php
session_start();
include "test_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Remove_Item"])) {
    if (isset($_POST['prod_name'])) {
        $itemToRemove = $_POST['prod_name'];

        // Remove one item from checkout_cart_items_list table
        $i = $_SESSION['id'];
        $sql_remove_item = "UPDATE checkout_cart_items_list SET Price = Price - (Price / Quantity), Quantity = Quantity - 1 WHERE items_list = '$itemToRemove' AND invoice_num = (SELECT invoice_num FROM checkout_cart WHERE id = '$i' ORDER BY invoice_num DESC LIMIT 1)";

        $result_remove_item = mysqli_query($conn, $sql_remove_item);

        if ($result_remove_item) {
            // Decrease product quantity in your Product table
            $sql_decrease_quantity = "UPDATE product SET Quantity_in_stock = Quantity_in_stock + 1 WHERE prod_name = '$itemToRemove'";
            $result_decrease_quantity = mysqli_query($conn, $sql_decrease_quantity);

            if ($result_decrease_quantity) {
                // Update the cart in the session (remove the item if quantity becomes zero)
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['Item_name'] == $itemToRemove) {
                        $realPrice = $item['Price'];
                        if ($item['Quantity'] > 1) {
                            $_SESSION['cart'][$key]['Quantity']--;
                        } else {
                            unset($_SESSION['cart'][$key]);
                        }
                        break;
                    }
                }
                
                // Update the total price in the checkout cart
                $sql_update_price = "UPDATE Checkout_Cart SET total_price = total_price - $realPrice WHERE id='$i' order by invoice_num DESC LIMIT 1";
                mysqli_query($conn, $sql_update_price);
                
                echo "<script>
                        alert('Item Quantity Decreased in Cart');
                        window.location.href = 'mycart.php'; // Redirect to cart page
                      </script>";
            } else {
                echo "Error decreasing product quantity: " . mysqli_error($conn);
            }
        } else {
            echo "Error removing item from cart: " . mysqli_error($conn);
        }
    }
}
?>
