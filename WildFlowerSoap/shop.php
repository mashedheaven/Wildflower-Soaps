<!DOCTYPE html>
<html>
    <?php include 'header.inc'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Us</title>
    <link href='https://fonts.googleapis.com/css?family=Amiri' rel='stylesheet'>    
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="shopstyle.css">
</head>
<body>
    <!-- shop -->

    <main>
    <section class="home-shop">
        <div class="home-text-shop" style="text-align:center">
            <h5>browse and explore</h5>
            <h1>Shop Our Products</h1>
            <p>botanical soap handmade with love & labour</p>
        </div> 
    </section>
      
      <div class = "products">
        <?php 
          include 'server_connection.php';
          $conn = OpenCon();
          $sql = "SELECT * FROM soapinfo";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
              echo "<div class=\"product-card\">
                      <a href='./template-product.php?param=$row[name]'class = \"dasda\"><div class=\"product-image\">
                        <img src= \" $row[imglink]\">
                      </div></a>
                      <div class=\"product-info\">
                        <h5 class=\"productname\">$row[name]</h5>
                        <h6>\$$row[price]</h6>
                      </div>
                    </div>";
            }
          }
          CloseCon($conn);
        ?>
        
      </div>
    </main>


</body>
<!-- footer section -->
<?php include 'footer.inc'; ?>

</html>