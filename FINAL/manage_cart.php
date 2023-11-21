<?php
session_start();
include "test_conn.php"; // Make sure you include the database connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        $itemToAdd = [
            'Item_name' => $_POST['prod_name'],
            'Price' => $_POST['price'],
            'Quantity' => 1
        ];

        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_name');
            if (in_array($_POST['prod_name'], $myitems)) {
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['Item_name'] === $_POST['prod_name']) {
                        $item['Quantity']++; // Increase quantity in the cart

                        // Update the database with the new quantity and price
                        $updatedQuantity = $item['Quantity'];
                        $updatedPrice = $item['Price'] * $updatedQuantity;
                        $sql_update = "UPDATE checkout_cart_items_list SET Quantity = $updatedQuantity, Price = $updatedPrice WHERE items_list = '{$_POST['prod_name']}' AND invoice_num = '$invoice_num'";
                        $result_update = mysqli_query($conn, $sql_update);

                        if ($result_update) {
                            echo "Product quantity updated in cart and database successfully";
                        } else {
                            echo "Error updating product quantity in database: " . mysqli_error($conn);
                        }
                    }
                }

                echo "<script>
                        alert('Item Added to Cart');
                        window.location.href = 'index.php';
                    </script>";
            } else {
                array_push($_SESSION['cart'], $itemToAdd);
                echo "<script>
                        alert('Item Added to Cart');
                        window.location.href = 'index.php';
                    </script>";
            }
        } else {
            $_SESSION['cart'] = [$itemToAdd];
            echo "<script>
                    alert('Item Added to Cart');
                    window.location.href = 'index.php';
                </script>";
        }
    }

    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_name'] == $_POST['prod_name']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>
                        alert('Item Removed!');
                        window.location.href = 'mycart.php';
                    </script>";
                break; // Exit the loop after removing the item
            }
        }
    }
}
?>
