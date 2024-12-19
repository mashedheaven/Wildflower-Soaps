<!DOCTYPE html>
<html lang="en">
    <?php include 'header.inc'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href='https://fonts.googleapis.com/css?family=Amiri' rel='stylesheet'>        
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="contactstyle.css">
    </head>
    <body>

        <section class="confirmation">
      <h2>Thank You!</h2>
      <p>Your feedback, suggestions, and comments have been invaluable in shaping our business, and we remain committed to delivering high-quality products and exceptional customer service. 
        <br> We appreciate your interest in our company and will get back to you as soon as possible.<br><br><br><br><br><br><br><br><br><br></p>
    </section>

        <?php 
        include 'server_connection.php'; 
        $con = OpenCon();

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
            $message = $_POST['message'];
            
            $sql = "INSERT INTO userenquire(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
            
            if(mysqli_query($con, $sql)){
                echo "<p> </p>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }
        }
        CloseCon($con);
        ?>
        
      </div> 
    </body>
    <?php include 'footer.inc'; ?>

</html>