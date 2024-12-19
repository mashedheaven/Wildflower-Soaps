<!DOCTYPE html>
<html lang="en">
    <?php include 'header.inc'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Amiri' rel='stylesheet'>        
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="homestyle.css">
</head>
    <body>
    <!-- homepage -->

    <main>
    <section class="home">
        <div class="home-text" style="text-align:center">
            <h5>welcome to</h5>
            <h1>WildFlower Soap</h1>
            <p>botanical soap handmade with love & labour</p>

            <a href="shop.php" class="home-btn">Shop Now</a>
        </div> 
    </section>

    <section class="product"> 
        <h2 class="product-category">our collection</h2>
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class = "products">
        <?php 
          include_once('server_connection.php');
          $conn = OpenCon();
          $sql = "SELECT * FROM soapinfo";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
              echo "<div class=\"product-card\">
                      <a class = \"dasda\"><div class=\"product-image\">
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
      </section>

    <section class="home-bottom">
        <div class="home-text-bottom" style="text-align:center">
            <h1>Vegan Artisan Soap</h1>
            <p>handcrafted in Singapore in small batches</p>
        </div> 
    </section>

    <div class="clients">
        <h2 class="our-clients">Our Clients</h2>
        <div class="client-list">
          <?php 
            include_once('server_connection.php');
            $conn = OpenCon();
            $sql = "SELECT imglink FROM client";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
                  echo "<div class=\"client-image\" style=\"width:33.33%; text-align:center\" >
                          <img src= \" $row[imglink]\">
                        </div>";
              }
            }
            CloseCon($conn);
          ?>

        </div>
      </div>

    </main>
    <script src="script.js"></script>

    </body>
    <?php include 'footer.inc'; ?>

</html>
