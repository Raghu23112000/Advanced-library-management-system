<?php if(!isset($_SESSION)){
  session_start();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>LIBRARY MANAGEMENT SYSTEM</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      <div>
      <h1 style="padding-top:300px;text-align:center;font-size:100px;color:white;" > welcome </h1>
      </div>
      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-md-13">
              <h2>About us</h2>
              <div class="about-content">

                A Library management system is a software that uses to maintain the record of the library. It contains work like the number of available books in the library, the number of books are issued or returning or renewing a book or late fine charge record, etc. Library Management Systems is software that helps to maintain a database that is useful to enter new books & record books borrowed by the members, with the respective submission dates. Moreover, it also reduces the manual record burden of the librarian.
Library management system allows the librarian to maintain library resources in a more operative manner that will help to save their time. It is also convenient for the librarian to manage the process of books allotting and making payment. Library management system is also useful for students as well as a librarian to keep the constant track of the availability of all books in a store.

            </div>
            <br><br>
            <div class="col-md-13">
            <p>Books available</p>
            <div class="progress">
               <div class="progress-bar" style="width:80%;">80%</div>
             </div>
             <p>Convenient and Easy</p>
             <div class="progress">
               <div class="progress-bar" style="width: 85%;">90%</div>
             </div>


            </div>
      </div>
        </div>
        </section>

  </body>
  <?php
  $email=$_SESSION['email'];
  $_SESSION["email"]=$email;
    //echo "<script>alert('{$email}');</script>";
  ?>
</html>
