<?php
// Message Vars
$msg = '';
$msgClass = '';
// check for Submit
if (filter_has_var(INPUT_POST, 'submit')) {
  // Get Form Data
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Check Required Fields
  if (!empty($email) && !empty($name) && !empty($message)) {
    // Passed
    // Check Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      // Failed
      $msg = 'Please use a Valid Email';
      $msgClass = 'alert-danger';
    } else {
      // Passed
      // Recipient Email
      $toEmail = 'contact@myhomeappliances.in';
      $subject = 'Contact Request Form' . $name;
      $body = '<h2>contact request</h2>
                 <h4>Name</h4><p>' . $name . '</p>
                 <h4>Email</h4><p>' . $email . '</p>
                 <h4>Message</h4><p>' . $message . '</p>
              ';
      // Email Headers
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-Type:text/html;charset=UTF-8" . "
                 \r\n";
      //Additional Headers
      $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

      if (mail($toEmail, $subject, $body, $headers)) {
        // Email Sent
        $msg = 'Your Email Has Been Sent successfully';
        $msgClass = 'alert-success';
      } else {
        // Failed
        $msg = 'Your Email Was not Sent';
        $msgClass = 'alert-danger';
      }
    }
  } else {
    // Failed
    $msg = 'Please Fill in All Fields';
    $msgClass = 'alert-danger';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta Tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="If you have any questions or suggestions, please use the contact form provided on our website. We would love to hear from you." />
  <link rel="shortcut icon" href="images/fav-icon.png">
  <!--Custom Style Css-->
  <link rel="stylesheet" href="css/style.css">
  <!--Bootstrap Css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">

  <title>Contact Us</title>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125168538-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-125168538-1');
  </script>
</head>

<body>
  <!--Header And Navigation Bar-->
  <header>
    <div class="logo"><a href="index.html"><img class="img-fluid" src="images/logo.jpg" alt="logo">
        MyHomeAppliances.in</a></div>
    <nav>
      <ul>
        <li><a href="index.html">HOME</a></li>
        <li class="sub-menu"><a href="home-appliances.html">HOME APPLIANCES</a>
          <ul>
            <li><a href="air-conditioner.html">AIR CONDITIONERS</a></li>
            <li><a href="washing-machine.html">WASHING MACHINE</a></li>
            <li><a href="air-coolers.html">AIR COLLERS</a></li>
            <li><a href="water-heaters.html">WATER HEATERS</a></li>
            <li><a href="led-tv.html">LED TELIVISIONS (TV)</a></li>
          </ul>
        </li>
        <li><a href="comparision.html">COMPARISION</a> </li>
        <li class="sub-menu"><a href="kitchen-appliances.html">KITCHEN APPLIANCES</a>
          <ul>
            <li><a href="refrigerator.html">REFRIGERATOR</a></li>
            <li><a href="mixer-grinder.html">MIXER GRINDER</a></li>
            <li><a href="water-purifiers.html">WATER PURIFIERS</a></li>
            <li><a href="microwave-ovens.html">MICROWAVE OVENS</a></li>
            <li><a href="dishwasher.html">DISHWASHER</a></li>
            <li><a href="chimneys.html">CHIMNEYS</a></li>
          </ul>
        </li>
        <li><a href="contact-us.php">CONTACT US</a></li>
      </ul>
    </nav>
    <div class="menu-toggle"><img src="images/toggle_button.png" class="img-fluid" alt="toggle-button"></div>
  </header>


  <!--Form-->
  <div class="container contact-form">
    <h1 class="text-center">Contact Form</h1>
    <hr>

    <?php if ($msg != '') : ?>
      <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
      </div>
      <br>
      <div class="text-center"> <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
  </div>
  <!--footer-->
  <footer>
    <div class="social">
      <a rel="nofollow" target="_blank" href="https://www.facebook.com/myhomeappliances.in/"><i class="fab fa-facebook-f"></i></a>
      <a rel="nofollow" target="_blank" href="https://in.pinterest.com/myhomeappliances91/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
      <a rel="nofollow" target="_blank" href="https://www.reddit.com/user/myhomeappliances"><i class="fab fa-reddit"></i></a>
      <a rel="nofollow" target="_blank" href="https://twitter.com/MYHOMEAPPLIANC1
"><i class="fab fa-twitter"></i></a>
      <a rel="nofollow" target="_blank" href="https://myhomeappliances91.tumblr.com/"><i class="fab fa-tumblr"></i></a>
      <a rel="nofollow" target="_blank" href="https://www.plurk.com/myhomeappliances"><i class="fab fa-product-hunt"></i></a>
      <a rel="nofollow" target="_blank" href="https://mix.com/myhomeappliances"><i class="fab fa-stumbleupon-circle"></i></a>
      <a rel="nofollow" target="_blank" href="https://www.linkedin.com/in/myhomeappliances-67298118b/
"><i class="fab fa-linkedin"></i></a>
      <a rel="nofollow" target="_blank" href="https://www.quora.com/profile/MYHOME-APPLIANCES"><i class="fab fa-quora"></i></a>
      <a rel="nofollow" target="_blank" href="http://digg.com/u/myhomeappliances"><i class="fab fa-digg"></i></a>
    </div>
    <div>
      <ul>
        <li><a rel="nofollow" href="amazon.html">Amazon Affiliate Disclosure</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li><a rel="nofollow" href="privacy-policy.html">Privacy Policy</a></li>
        <li><a rel="nofollow" href="disclaimer.html">Disclaimer</a></li>
        <li><a rel="nofollow" href="terms-and-condition.html">Terms And Conditions</a></li>
        <li><a href="sitemap.xml">SiteMap</a></li>
      </ul>
    </div>
    <section>
      Copyright &copy; 2019 MyHomeAppliances.in All Rights Reserved.
    </section>
  </footer>
  <!-- End Footer -->



  <!--Jquery.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
  <!--Popper.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
  <!--Bootstrap.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!--Custom Toggle Button JS File-->
  <script>
    $(document).ready(function() {
      $(".menu-toggle").click(function() {
        $("nav").toggleClass("active")
      }), $("ul li").click(function() {
        $(this).siblings().removeClass("active"), $(this).toggleClass("active")
      })
    });
  </script>
</body>

</html>