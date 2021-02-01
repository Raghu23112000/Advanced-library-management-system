<?php if(!isset($_SESSION)){
	session_start();
	}
?>

<?php include('header_user1.php'); ?>
<div>
<h2 style="padding-top:200px;text-align:center;font-size:50px;color:black;" > AVAILABLE BOOKS </h2>
</div>
<div class="formstyle" style="float: center;padding-left:600px;background-image: image(picture.jpg);padding-top:100px;margin-right:0px; margin-bottom:30px;">
<form enctype="multipart/form-data" method="post" class="text-center">
<div class="col-md-12">
<table style:"margin-left:auto; margin-right:auto;">
  <tr>
    <th style='padding: 15px;background-color: black;color: white;' >  User Name </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Phone Number  </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Branch  </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Email Id  </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Book Name  </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Book Id </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Author </th>
    <th style='padding: 15px;background-color: black;color: white;' >  Return  </th>
  </tr>";
</table>
</div>
</form>
</div>
