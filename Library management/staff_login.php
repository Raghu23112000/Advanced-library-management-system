<?php if(!isset($_SESSION)){
	session_start();

	}
?>
<?php include('header.php'); ?>
<br>
<div>
<h2 style="padding-top:100px;text-align:center;font-size:50px;color:grey;" > STAFF LOGIN </h2>
</div>
			<div class="formstyle" style="float: center;padding:25px;background-image: image(picture.jpg);padding-top:100px;margin-right:0px; margin-bottom:30px;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
					<table style="margin-left:auto;margin-right:auto;">
						<tr>
							<td><label><b>User Email-ID :
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
							<td><input type="password" name="password"  placeholder="Password" style="float: center;width: =100%;
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
		<span style="color:#000;">Not a member yet?</span><a href="staff_registration.php" title="create a account" target="" style="color:blue">&nbsp;Sign Up</a>
</form>
					</td>
						</tr>
					</table>


				 <br>

				<br>



	</div>


</div>

<?php
	include('config.php');
	if(isset($_POST["submit"]))
	{
		$email=$_POST["email"];
		$password=$_POST["password"];
		$sql="SELECT * FROM staff WHERE email='".$email."'";
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
						echo "<script>alert('Congratulations..!!!,Successfully Logged In');</script>";
						echo "<script>location.replace('header_user.php');</script>";
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
