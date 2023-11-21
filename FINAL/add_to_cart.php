 <?php
session_start();
include "test_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])){
        if(isset($_POST['prod_name']) && isset($_POST['price']) && isset($_SESSION['id']) && isset($_POST['prod_id']) && isset($_SESSION['user_name'])){
	
	     $u = $_POST['prod_name'];
	     $p = $_POST['price'];
             $i = $_SESSION['id'];
             $n = $_SESSION['user_name'];
             $pi = $_POST['prod_id'] ;
              

                 $sql_quantity = "select Quantity_in_stock  from product where prod_id = '$pi'   ";
                 $get_quantity = mysqli_query($conn, $sql_quantity);
                 $row = mysqli_fetch_assoc($get_quantity) ;
                 $quantity = $row["Quantity_in_stock"]  ;
              if ($quantity ==0 ){
              
                   echo "<script>
                       alert('Quantity Out Of Stock');
                        window.location.href = 'index.php';
                     </script>";

             

             }   else {
  



               
             
             //Retrieve the latest invoice_num

             $sql_get_invoice = "select invoice_num  from checkout_cart where id = '$i' order by invoice_num desc limit 1   ";
             $get_invoice = mysqli_query($conn, $sql_get_invoice);
             $row = mysqli_fetch_assoc($get_invoice) ;
             $invoice_num = $row["invoice_num"]  ;


            
             //if an invoice_num exists
             if (mysqli_num_rows($get_invoice) > 0) {


                  //check if it is in the payment table
                 $check_payment= " select * from payment where invoice_num='$invoice_num'     ";
                 $result_check =  mysqli_query($conn, $check_payment);
         
                 
                 // if payment is made for the invoice, assign new invoice

                 if (mysqli_num_rows($result_check) > 0){
                    
                      $sql_invoice="INSERT INTO checkout_cart (id , total_price) VALUES( '$i' ,'$p' )   ";
                      $result_invoice=mysqli_query($conn, $sql_invoice);


                      //retrieve the new invoice



                      $sql_get_invoice = "select invoice_num  from checkout_cart where id = '$i' order by invoice_num desc limit 1   ";
                      $get_invoice = mysqli_query($conn, $sql_get_invoice);
                      $row = mysqli_fetch_assoc($get_invoice) ;
                      $invoice_num = $row["invoice_num"]  ;
            

                      $sql = " INSERT INTO checkout_cart_items_list (  prod_id , invoice_num , items_list , Price , Quantity) VALUES( '$pi' , '$invoice_num' , '$u', '$p',1 ) " ;

                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                         echo "New product added to cart successfully";
                         $update = "UPDATE product SET Quantity_in_stock = Quantity_in_stock -1   WHERE prod_id = '$pi'  ";
                         $execute =  mysqli_query($conn, $update);

                      }

                 //if payment is not made for the invoice, update values for that invoice
             
                 }else{


                      
                      
                      $sql_insert = " UPDATE checkout_cart SET total_price = total_price + '$p' WHERE id = '$i' and invoice_num = '$invoice_num' ";
                      $result_insert = mysqli_query($conn, $sql_insert);



                        //checkout_cart_items_list


                        $sql_product = "SELECT * FROM checkout_cart_items_list WHERE Items_list='$u' and invoice_num ='$invoice_num' ";
                        $result_product = mysqli_query($conn, $sql_product);

                        if (mysqli_num_rows($result_product) > 0) {
                              $sql_quantity=" UPDATE checkout_cart_items_list SET Quantity = Quantity + 1 WHERE items_list = '$u' and invoice_num = '$invoice_num' ";
                              $sql_price=" UPDATE checkout_cart_items_list SET Price = Price + '$p' WHERE items_list = '$u' and invoice_num = '$invoice_num' ";

                  
                                 $result_quantity=mysqli_query($conn, $sql_quantity);
                                 $result_price=mysqli_query($conn, $sql_price);


                                 $update = "UPDATE product SET Quantity_in_stock = Quantity_in_stock -1   WHERE prod_id = '$pi'  ";
                                 $execute =  mysqli_query($conn, $update);


                                 if ($result_price){
                                      echo "<script>
                                             alert('Item Added to Cart');
                                             window.location.href = 'index.php';
                                            </script>";

                                 }

                          }else   {



                                        $sql = " INSERT INTO checkout_cart_items_list (  prod_id , invoice_num , items_list , Price , Quantity) VALUES( '$pi' , '$invoice_num' , '$u', '$p',1 ) " ;

                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                                  echo "New product added to cart successfully";
                                                 $update = "UPDATE product SET Quantity_in_stock = Quantity_in_stock -1   WHERE prod_id = '$pi'  ";
                                                 $execute =  mysqli_query($conn, $update);


                                             }
                          }


                       

                            
                   }
 
                         


             

 
             
	     // if the customer is new
             } else {
                      $sql_invoice="INSERT INTO checkout_cart (id , total_price) VALUES( '$i' ,'$p' )   ";
                      $result_invoice=mysqli_query($conn, $sql_invoice);
               
                      //checkout_cart_items_list actions


                       
                      $sql_get_invoice = "select invoice_num  from checkout_cart where id = '$i' order by invoice_num desc limit 1   ";
                      $get_invoice = mysqli_query($conn, $sql_get_invoice);
                      $row = mysqli_fetch_assoc($get_invoice) ;
                      $invoice_num = $row["invoice_num"]  ;
            

                      $sql = " INSERT INTO checkout_cart_items_list (  prod_id , invoice_num , items_list , Price , Quantity) VALUES( '$pi' , '$invoice_num' , '$u', '$p',1 ) " ;

                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                         echo "New product added to cart successfully";
                         //update quantity
                          $update = "UPDATE product SET Quantity_in_stock = Quantity_in_stock -1   WHERE prod_id = '$pi'  ";
                          $execute =  mysqli_query($conn, $update);
                      }
             }


        

 



    //Adnan's code

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
                    }
                }
        
                
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




        }
}

?>






<?php
//session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    

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
