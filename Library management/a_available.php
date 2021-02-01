<?php if(!isset($_SESSION)){
	session_start();
	}
?>

<?php include('header_admin.php'); ?>
<div>
<h2 style="padding-top:200px;text-align:center;font-size:50px;color:black;" > AVAILABLE BOOKS </h2>
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

<th style='padding: 15px;background-color: black;color: white;' >  Book Name  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Book ID </th>
<th style='padding: 15px;background-color: black;color: white;' >  Author Name  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Section  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Price  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Row No  </th>
<th style='padding: 15px;background-color: black;color: white;' >  Column No </th>
</tr>";
while($row=mysqli_fetch_assoc($res))
{
	echo "<tr>";
	echo "<tr>"; echo $row['bookname']; echo "</td>";
	echo "<tr>"; echo $row['book_id']; echo "</td>";
	echo "<tr>"; echo $row['author']; echo "</td>";
	echo "<tr>"; echo $row['section']; echo "</td>";
	echo "<tr>"; echo $row['price']; echo "</td>";
	echo "<tr>"; echo $row['row_no']; echo "</td>";
	echo "<tr>"; echo $row['column_no']; echo "</td>";
	echo "</tr>";
}
echo "</table>";
 ?>
