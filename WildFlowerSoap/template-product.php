<!DOCTYPE html>
<html>
<?php include 'header.inc'; ?>
    <head>
        <!-- Author: Rizwan Ahamed -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our Soap</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <link rel="stylesheet" href="template-product.css">
        
    </head>
    <body>
    
    <div class = "main-section">
        <div class = "product">
            <div class = "products">
                <?php
                    session_start();
                    $_SESSION['templateproductpage'] = TRUE;                    
                    // store GET request in $name
                    $name = $_GET["param"];
                    // SELECT corresponding description, image, price from mysql
                    include 'server_connection.php';
                    $conn = OpenCon();
                    $sql = "SELECT * FROM soapinfo WHERE name = '$name'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        $namec = $row['name'];
                        echo "
                            <div class=\"imagedesContainer\" style=\"width:100%; text-align:center\" >
                                <img src= \" $row[imglink]\">

                            <div class=\"descr\">
                                    <p>$row[description]</p>
                            </div>
                            </div>
                            </br>

                            <a href=\"./cart-page.php?param1=$namec\">
                                <button class =\"addtocart\" style=\"width: 100%\">
                                    <p>Add to Cart</p>
                                </button>
                            </a>

                            ";

                    }   
                    else{
                        echo "item not retrieved from database";
                    }
                ?>
            </div>
        </div>
    </div>    

    </body>

    <?php include 'footer.inc'; ?>
    
</html>