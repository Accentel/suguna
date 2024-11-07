<!DOCTYPE html>
<html>
<head>
  <?php include("header.php"); ?>

  <?php
    session_start();
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a random CSRF token
    ?>
  <!-- Load stylesheets -->
  <link type="text/css" rel="stylesheet" href="login/css/style.css" media="screen" />
  <!-- // Load stylesheets -->
 <!-- Include the CryptoJS library -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#submit2").hover(
        function() {
          $(this).animate({"opacity": "0"}, "slow");
        },
        function() {
          $(this).animate({"opacity": "1"}, "slow");
        });
    });

    function checkSum() {
      var num1 = Math.floor(Math.random() * 10); // Generate random number 1 (0-9)
      var num2 = Math.floor(Math.random() * 10); // Generate random number 2 (0-9)
      var userSum = parseInt(prompt("Please solve the following: " + num1 + " + " + num2)); // Prompt user to solve sum

      var correctSum = num1 + num2;

      if (userSum === correctSum) {
        document.getElementById('frm').submit(); // Submit the form
      } else {
        alert('Incorrect sum. Please try again.');
      }
    }
  </script>
<style>

#username {
  position: relative; /* Set position to relative */
  width: 300px;
  height: 48px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 18px;
  margin-left: -12px; /* Adjust the leftward movement */
  transition: margin-left 0.3s ease-in-out; /* Add a transition effect */
}

#password {
  position: relative; /* Set position to relative */
  width: 300px;
  height: 48px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 18px;
  margin-left: -12px; /* Adjust the leftward movement */
  transition: margin-left 0.3s ease-in-out; /* Add a transition effect */
}


  </style>
   <script>
    function setCSRFToken() {
      // Set the CSRF token value dynamically when the page loads
      var csrfToken = '<?php echo $_SESSION['csrf_token']; ?>';
      document.getElementById('csrf_token').value = csrfToken;
    }

    function encryptCredentials() {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;

      // Hash the username and password
      var encryptedUsername = CryptoJS.SHA256(username).toString(CryptoJS.enc.Base64);
      var encryptedPassword = CryptoJS.SHA256(password).toString(CryptoJS.enc.Base64);

      // Assign encrypted values to form fields
      document.getElementById('username').value = encryptedUsername;
      document.getElementById('password').value = encryptedPassword;
    }
  </script>
</head>
<body onload="setCSRFToken()" >
  <div id="conteneur">
    <div id="header"><?php include("title1.php"); ?></div>
    <div id="centre">
    <form action="login_suc.php" method="post" name="frm" id="frm" onsubmit="encryptCredentials()">
        <p style="margin-top:20px;font-size:22px;color:red;font-family:verdana;" align="center"></p>
        <input type="hidden" name="csrf_token" id="csrf_token" value="">
        <div id="wrapper">
          <div id="wrappertop"></div>
          <div id="wrappermiddle">
            <h2>Login</h2>
            <div id="username_input">
              <div id="username_inputleft"></div>
              <div id="username_inputmiddle">
              <input type="text" name="useacc" required="required" id="username" placeholder="Username" autocomplete="off">
              </div>
              <div id="username_inputright"></div>
            </div>
           
            <div id="password_input">
              <div id="password_inputleft"></div>
              <div id="password_inputmiddle">
              <input type="password" name="pasacc" required="required" id="password" placeholder="Password">
              </div>
              <div id="password_inputright"></div>
            </div>

            <div id="submit">
              <input type="button" value="" style="background:url(login/images/submit.png);width:300px;height:40px;" id="submit2" onclick="checkSum()">
            </div>

            <div id="links_left">
              <a href="#">Forgot your Password?</a>
            </div>

            <div id="links_right">
              <a href="#">Not a Member Yet?</a>
            </div>
          </div>
          <div id="wrapperbottom"></div>
          <div id="powered"></div>
        </div>  
      </form>
    </div>
    <?php include('footer.php'); ?>
  </div>
</body>
</html>
