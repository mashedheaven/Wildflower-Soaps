<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <?php include 'header.inc'; ?>
    <head>
        <!-- Author: Rizwan Ahamed -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check out</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
       
        <link rel="stylesheet" href="cart-page.css">
       
    </head>
    <body>
    <!-- style="text-align:center ; align-items: center; align-self: center; align-content: center; width: 50%;" -->
        <div class = "cart-section">
            <div class = "product">
                <div class ="products">
                    <h1 class="title" style="text-align:center">Shopping Cart</h1>
                    </br>

                    <?php
                        include 'server_connection.php';
                        $conn = OpenCon();
                        ini_set('display_errors', '1');
                        // this if statement below is to check whether the user is redirected from template-product-page
                        if ((isset( $_SESSION['templateproductpage'] ) && $_SESSION['templateproductpage'] === TRUE ) ){
                            $name = $_GET['param1'];
                            if(!is_null($name)){
                                $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
                                if(!isset($_SESSION['cart'])){
                                    $_SESSION['cart'] = array();
                                }
                                if(isset($_SESSION['cart'][$name])){
                                    $_SESSION['cart'][$name] += $quantity;
                                }else{ 
                                    $_SESSION['cart'][$name] = $quantity;
                                }
                            }else{
                                echo "<p class=\"empty\" style=\"text-align:center\" >There are no products in the cart</p>";
                            }
                            $_SESSION['templateproductpage'] = FALSE;
                            
                        } else {
                           // else not redirected from template-product-page
                        }
                        if(!empty($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $name => $quantity){
                                if($quantity > 0){
                                    $sql = "SELECT * FROM soapinfo WHERE name = '$name'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo "
                                    
                                        <div>
                                            <img src =\"$row[imglink]\">
                                            <div class=\"product-info\" style=\"width:50%; text-align:center\" >
                                                <h3>{$row['name']}</h3>
                                                <p>Price: {$row['price']}</p>
                                                <div class='quantity-container'>
                                                    <a href=\"\" class=\"quantity-changers-minus\" data-name=\"$row[name]\">-</a>   
                                                    <p id='quantity-$row[name]' class='quantity-p'>$quantity</p>
                                                    <a href=\"\" class=\"quantity-changers-plus\" data-name=\"$row[name]\">+</a>
                                                </div>
                                                </br>
                                                <div>
                                                    <a href=\"\" class=\"clear-button\"data-name=\"$row[name]\">remove item</a>   
                                                </div>
                                            </div>
                                        </div>
                                        </br>

                                    ";
                                }
                                
                            }
                            echo"
                            </br>
                                    <button class=\"checkout-button\" onclick=\"location.href='./shop.php'\" style=\"width: 100%\">
                                        <p>Add More</p>
                                    </button>
                                ";
                            echo"
                            </br>
                                    <button class=\"checkout-button\" onclick=\"location.href='./checkoutpage.php'\" style=\"width: 100%\">
                                        <p>Proceed to Checkout</p>
                                    </button>
                                ";
                                
                        }else{
                            echo"<p class=\"empty\" style=\"text-align:center\">No products added, Cart is empty";
                        }
                        CloseCon($conn);
                    ?>
                    </div>
                </div>

        </div>
        <?php
            ini_set('display_errors', 1);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
                // Check if the request has the correct Content-Type header
                if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
              
                  // Get the JSON data from the request body
                  $json_data = file_get_contents('php://input');
              
                  // Parse the JSON data into a PHP object or associative array
                  $data = json_decode($json_data, true);
              
                  // Use the data in your PHP code
                  // For example, to get a value from the JSON data:
                  $name = $data['name'];
                  $quantity = $data['quantity'];
                  $_SESSION['cart'][$name] = $quantity;
                  echo "Hello, $name!";
                  foreach($_SESSION['cart'] as $name => $quantity){
                    if($quantity==0){
                        unset($_SESSION['cart'][$name]);
                    }
                  }

                }else{
                    echo"no POST";
                }
            }else{
                
            }
    
        ?>
    </body>

    <?php include 'footer.inc'; ?>
    <script>
        const minusLinks = document.querySelectorAll('.quantity-changers-minus');
        minusLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                console.log("hello");
                event.preventDefault();
                const name = link.getAttribute('data-name');
                const quantityParagraph = document.getElementById(`quantity-${name}`);
                console.log(quantityParagraph);
                let quantity = parseInt(quantityParagraph.textContent);
                console.log(quantity);
                quantity--;
                if(quantity > 0){
                    quantityParagraph.textContent = quantity;
                    sendData(name, quantity);
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1000);
                }else{
                    alert("Quantity cannot be 0")
                }
                
            });
        });

        const plusLinks = document.querySelectorAll('.quantity-changers-plus');
        plusLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                console.log("hello");
                event.preventDefault();
                const name = link.getAttribute('data-name');
                const quantityParagraph = document.getElementById(`quantity-${name}`);
                console.log(quantityParagraph);
                let quantity = parseInt(quantityParagraph.textContent);
                console.log(quantity);
                quantity++;
                if(quantity > 0){
                    quantityParagraph.textContent = quantity;
                    sendData(name, quantity);
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1000);
                }else{
                    alert("Quantity cannot be 0")
                }
            });
        });
        const clearLinks = document.querySelectorAll('.clear-button');
        clearLinks.forEach(link => {
            link.addEventListener('click', (event)=>{
                event.preventDefault();
                const name = link.getAttribute('data-name');
                const quantityParagraph = document.getElementById(`quantity-${name}`);
                let quantity = parseInt(quantityParagraph.textContent);
                console.log(quantity);
                quantity = 0;
                sendData(name, quantity);
                setTimeout(function() {
                        location.reload();
                }, 1000);

            })


        })

        function sendData(name, quantity) {
            var data = {
                name: name,
                quantity: quantity,
            };

            var xhr = new XMLHttpRequest();

            
            xhr.open("POST", "cart-page.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    //alert(xhr.responseText);
                }
            };

           
            xhr.send(JSON.stringify(data));
        }

    </script>                            
    
</html>