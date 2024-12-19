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
<!-- contact us -->

    <main>
<section >
  <div class="container" style="text-align:center ; align-items: center; align-self: center; align-content: center; width: 100%;">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">10 Dover Drive</div>
          <div class="text-two">Singapore 138683</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+65 9313 4274</div>
          <div class="text-two">+65 6782 3922</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">enquiry@wildflower.com</div>
          <div class="text-two">info@wildflower.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Drop An Enquiry</div>
        <p>We would love to hear from you! Get in touch via the contact details below and we will get back to you shortly! </p>
        <form method="post" action="confirmation.php">
        <div class="input-box">
        <input type="name" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>
        <div class="input-box">
        <input type="subject" id="subject" name="subject" placeholder="Enter your subject" required>
        </div>
        <div class="input-box">
        <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
        </div>
        <div class="input-box message-box">
          
        </div>
        <div class="button" style="text-align:center ; align-items: center; align-self: center; align-content: center; width: 100%;">
        <input type="submit" name="submit" value="Send Now">
        </div>
      </form>
    </div>
    </div>
  </div>
  </section>

</div> 
    
</main>

    </main>

</body>
<?php include 'footer.inc'; ?>

</html>
