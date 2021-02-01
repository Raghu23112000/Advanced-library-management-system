<?php if(!isset($_SESSION)){
	session_start();
	}
?>

<?php include('header_admin.php'); ?>
<div>
<h2 style="padding-top:200px;text-align:center;font-size:50px;color:black;" > STAFF DETAILS </h2>
</div>


<?php
    $email=$_SESSION["email"];
    $_SESSION["email"]=$email;
    //echo "<script>alert('{$email}');</script>";
  ?>
<?php
 include('config.php');
 $res=mysqli_query($library,"SELECT * FROM `book`;");
 echo "<table border='1' align='center' text-align='center'   width='80%' cellspacing='0'
			style='margin-left:auto; margin-right:auto;'>
<tr>

<th style='padding: 15px;background-color: black;color: white;' >  User Name  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Staff ID </th>
<th style='padding: 15px;background-color: black;color: white;' >  Phone No  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Branch  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Email ID  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Password  </th>
</tr>";
while($row=mysqli_fetch_assoc($res))
{
	echo "<tr>";
	echo "<tr>"; echo $row['username']; echo "</td>";
	echo "<tr>"; echo $row['staff_id']; echo "</td>";
	echo "<tr>"; echo $row['phno']; echo "</td>";
	echo "<tr>"; echo $row['branch']; echo "</td>";
	echo "<tr>"; echo $row['email']; echo "</td>";
	echo "<tr>"; echo $row['password']; echo "</td>";
	echo "</tr>";
}
echo "</table>";
 ?>
