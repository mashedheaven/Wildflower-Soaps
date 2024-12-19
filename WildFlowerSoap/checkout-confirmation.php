<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'header.inc'; ?>
    <!-- author: Dafid Bin Marzuki -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check Out Confirmation</title>
        <link href='https://fonts.googleapis.com/css?family=Amiri' rel='stylesheet'>        
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="contactstyle.css">
    </head>
    <body>

        <section class="confirmation">
      <h2>Thank You!</h2>
      <p>Thank you for making your purchase with us!
        <br> Come back soon!<br><br><br><br><br><br><br><br><br><br></p>
    </section>

        <?php 
            
            ini_set('display_errors', '1');
            include 'server_connection.php'; 
            $con = OpenCon();

           // if ($_SERVER['HTTP_REFERER'] == './checkoutpage.php'){
                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    // echo $name;
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $postalcode = $_POST['postalcode'];

                    $cardname = $_POST['cardname'];
                    $card = $_POST['card'];
                    $exp_date = $_POST['exp_date'];
                    $cvv = $_POST['cvv'];
                    if(!empty($_SESSION['cart'])){
                        $purchase_string= '';
                        
                        foreach($_SESSION['cart'] as $name => $quantity){
                            
                            $purchase_string .= $name.'+'.$quantity;
                        }
                    
                    
                    }
                    $sql = "INSERT INTO purchase_history(name, email, address, city, postalcode, cardname, card, exp_date, cvv, purchase_string) VALUES ('$name', '$email', '$address', '$city', '$postalcode', '$cardname','$card','$exp_date','$cvv','$purchase_string')";
                    
                    if(mysqli_query($con, $sql)){
                        echo "<p> </p>";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    }
                } 
                if(session_status()===PHP_SESSION_ACTIVE){
                    session_destroy();
                }
                CloseCon($con);



            // }
        ?>
        
      </div> 
    </body>
    <?php include 'footer.inc'; ?>

</html>