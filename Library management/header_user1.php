<?php if(!isset($_SESSION)){
  session_start();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>LIBRARY MANAGEMENT SYSTEM</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body style="background-image: url('picture3.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
      <div class="main">
        <img src="logo2.png" width="500" height="100" >

        <ul>
          <br>
          <li><a href="history.php">History</a></li>
          <li><a href="request_a_book.php">Request a Book</a></li>
          <li><a href="search_a_book.php">Search a Book</a></li>
          <li><a href="home.php">Log out</a></li>
        </ul>
      </div>
  </body>
  <?php
  $email=$_SESSION['email'];
  $_SESSION["email"]=$email;
    //echo "<script>alert('{$email}');</script>";
  ?>
</html>
