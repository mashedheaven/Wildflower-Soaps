<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php include 'header.inc'; ?>
    <head>
        <!-- Author: Rizwan Ahamed -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check out</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <link rel="stylesheet" href="checkoutpage.css">
        
    </head>
    <body>
        <div class="checkout_page_main">

            <div class="form-container">

                <h1 class="checkout" style="text-align:center">Checkout</h1>

                <div class = "row">

                    <div class = "col">

                        <h3 class="title" style="text-align:center">billing address</h3>

                        <form method="post" action="checkout-confirmation.php" >

                        <div class="inputbox">
                            <label for="name">Name :</label>
                            <input type="text" placeholder="Ramu Gogul" id="name" name="name" required>
                        </div>

                        <div class="inputbox">
                            <label for="email">Email :</label>
                            <input type="email" placeholder="info@wildflower.com" id="email" name="email" required>
                        </div>

                        <div class="inputbox">
                            <label for="address">Address :</label>
                            <input type="text" placeholder="10 Dover Drive" id="address"  name="address" required></textarea>
                        </div>

                        <div class ="flex">
                            <div class="inputbox">
                                <label for="City">City :</label>
                                <input type="text" placeholder="Singapore" id="city"  name="city" required></textarea>
                            </div>

                            <div class="inputbox">
                                <label for="postalcode">Postalcode :</label>
                                <input type="text" placeholder="138683" id="potalcode"  name="postalcode" required></textarea>
                            </div>
                        </div>

                    </div>
    
                    <div class = "col">

                        <h3 class="title" style="text-align:center">payment info</h3>

                        <div class="inputbox">
                            <label for="cardname">Name on Card :</label>
                            <input type="text" placeholder="Ramu Gogul" id="cardname" name="cardname" required>
                        </div>

                        <div class="inputbox">
                            <label for="card">Card Number :</label>
                            <input type="number" placeholder="1111222233334444" id="card" name="card" required>
                        </div>

                        <div class="inputbox">
                            <label for="exp_date">Expiration Date :</label>
                            <input type="text" placeholder="11/27" id="exp_date" name="exp_date" required>
                        </div>

                        <div class="inputbox">
                            <label for="cvv">CVV :</label>
                             <input type="number" placeholder="123" id="cvv" name="cvv" required>
                        </div>

                    </div>

                 </div>

                        <input type="submit" value="Purchase" name="submit" class="purchase-btn">

                        </form>
            </div>
                    
                </br>
            <div class="cart-section">
                <div class="cart">

                    <h3 class="title2" style="text-align:center">Shopping Cart</h3>

                    <?php
                        include_once('server_connection.php');
                        $conn = OpenCon();
                        $final_price = 0;
                        if(!empty($_SESSION['cart'])){
                        
                            foreach($_SESSION['cart'] as $name => $quantity){
                                if($quantity > 0){
                                    $sql = "SELECT * FROM soapinfo WHERE name = '$name'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_price  = $row['price'] * $quantity;
                                    $final_price += $total_price;
                                    $fp = $final_price;

                                    echo "
                                            </br>
                                            <div>
                                            <img src =\"$row[imglink]\">
                                            
                                            <div class=\"row-cart\" style=\"width:50%; text-align:center\">
                                                <p>$row[name]</p>
                                                <p>Amount: $quantity</p>
                                                <p class=\"price-item\">\$$total_price</p>
                                            </div>
                                            </div>
                                    ";


                                }else{
                                    unset($_SESSION['cart'][$name]);
                                }        
                                
                            }
                            if($fp > 0){
                                echo"
                                    <div class=\"cart-total\" style=\"text-align:center\">
                                        <h3 class=\"price-item\">Total: $$fp</h3>
                                    </div>      
                                ";
                            }else{
                                echo"<p>No Items to checkout</p>";
                            }
                        }
                        CloseCon($conn);
                    ?>

                 </div>
            </div>


        </div>
    </body>

    <?php include 'footer.inc'; ?>


</html>