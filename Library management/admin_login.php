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
  <body style="background-image: url('picture0.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
      <div class="main">



	<br>

			<div class="formstyle" style="float: center;padding:25px;margin-right:0px; margin-bottom:30px;padding-top:300px;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
					<table style="margin-left:auto;margin-right:auto;">
						<tr>
							<td><label><b>Admin Email-ID :
							</b></label></td>
							<td><input type="email" name="email"  placeholder="User Email" style=" float: center;width: =100%;
					 			border: 2px solid #aaa;
					 			border-radius: 4px;
					 			margin: 8px 0;
					 			outline: none;
					 			padding: 8px;
					 			box-sizing: border-box;" required>
							</td>

						</tr>
						<tr>
							<td><label><b>Password :
							</b></label></td>
							<td><input type="password" name="password"  placeholder="Password" style="width: =100%;
					 			border: 2px solid #aaa;
					 			border-radius: 4px;
					 			margin: 8px 0;
					 			outline: none;
					 			padding: 8px;
					 			box-sizing: border-box;"required>
							</td>
						</tr>

<tr><td>
					<button name="submit" type="submit" style="margin-left: 20px;width: 100px;border-radius: 10px; padding: 15px 32px;background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;">Login</button>
		<br>

</td>
</tr>
</table>
				</form> <br>&nbsp;&nbsp;&nbsp;

				<br>






	</div>


</div>

<?php
	include('admin_config.php');
	if(isset($_POST["submit"]))
	{
		$email=$_POST["email"];
		$password=$_POST["password"];
		$sql="SELECT * FROM admin WHERE email='".$email."'";
		$result=mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$flag=0;
		if($count>=1)
		{
			while($row=mysqli_fetch_array($result))
			{
				if($email==$row["email"])
				{
					if($password==$row["password"])
					{
						$flag=1;
						$_SESSION["email"]=$email;
						echo "<script>alert('Congratulations..!!,Successfully Logged In');</script>";
						echo "<script>location.replace('header_admin.php');</script>";
						break;
					}
				}
			}
		}
		if($flag==0)
		{
			echo "<script>alert('Sorry, Invalid Username or Password');</script>";
		}
	}
	$conn->close();
?>

</body>
</html>
