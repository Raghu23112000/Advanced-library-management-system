<?php if(!isset($_SESSION)){
	session_start();
	}
?>
<?php include('header.php'); ?>
<br>
<div>
<h2 style="padding-top:100px;text-align:center;font-size:50px;color:grey;" > STUDENT REGISTRATION FORM </h2>
</div>
		<div class="formstyle" style="float: center;padding:25px;background-image: image(picture.jpg);padding-top:100px;margin-right:0px; margin-bottom:30px;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				 <table style="margin-left:auto;margin-right:auto;">
					 <tr>
 						<td><label><b>User Name :
 						</b></label></td>
 						<td><input type="text" name="username"  placeholder="User Name"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required>
 						</td>
 					</tr>
					  <tr>
 						<td><label><b>Roll No :
 						</b></label></td>
 						<td><input type="text" name="rollno"  placeholder="Roll no"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required>
 						</td>
 					</tr>

					<tr>
						<td><label><b>Phone Number :
 						</b></label></td>
 						<td><input type="number" name="contact"  placeholder="Phone Number"
						style=" float: center;
						width: =100%;
						border: 2px solid #aaa;
						border-radius: 4px;
						margin: 8px 0;
						outline: none;
						padding: 8px;
						box-sizing: border-box;" required="required"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="please enter only numbers between 10 to 11 for mobile no."/>
 						</td>
					</tr>
					<tr>
						<td><label><b>Branch :
 						</b></label></td>
 						<td><input type="text" name="branch" value="" placeholder="Branch"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required="required"  >
 						</td>
					</tr>
										<tr>
 						<td><label><b>Year :
 						</b></label></td>
 						<td><input type="number" name="year"  placeholder="Year"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;"  pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age" required/>
 						</td>
 					</tr>
					<tr>
						<td><label><b>Email-ID :
 						</b></label></td>
 						<td><input type="email" name="email"  value="" placeholder="email"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required>
 						</td>
					</tr>
					<tr>
						<td><label><b>New Password :
 						<b></label></td>
 						<td><input type="password" name="newpassword"  value="" placeholder="New password"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required>
 						</td>
					</tr>
                                        <tr>
						<td><label><b>Confirm Password :
 						</b></label></td>
 						<td><input type="password" name="confirmpassword"  value="" placeholder="Confirm password"
							style=" float: center;
						  width: =100%;
							border: 2px solid #aaa;
							border-radius: 4px;
							margin: 8px 0;
							outline: none;
							padding: 8px;
							box-sizing: border-box;" required>
 						</td>
					</tr>
				 <tr><td>
				 <br>
	<button name="submit" type="submit" style="margin-left: 20px;width: 100px;border-radius: 10px; padding: 15px 32px;background-color: #4CAF50;color: white;
padding: 14px 20px;margin: 8px 0;
border: none;cursor: pointer;">Register</button>
</form>
</td>
</tr>
</table>
			</div>
	</div>
	</div>

<?php
	include('config.php');

	if(isset($_POST["submit"]))
	{
		$username=$_POST["username"];
		$rollno=$_POST["rollno"];
		$phno=$_POST["contact"];
		$branch=$_POST["branch"];
		$year=$_POST["year"];
		$email=$_POST["email"];
		$newpassword=$_POST["newpassword"];
		$confirmpassword=$_POST["confirmpassword"];
		if($newpassword==$confirmpassword)
		{
			$sql="SELECT * FROM student WHERE email='".$email."' ";
			$result = $conn->query($sql);
	        if ($result->num_rows > 0) {
				echo "<script>alert('Sorry, Student already exist!');</script>";
			}
			else
			{
				$sql_insert="INSERT INTO student(username,rollno,phno,branch,year,email,password) VALUES
				('{$username}','{$rollno}','{$phno}','{$branch}','{$year}','{$email}','{$newpassword}')";
				if($conn->query($sql_insert)==TRUE)
				{
					echo "<script>alert('Congratulations..!!,Successfully Registered');</script>";
					echo "<script>location.replace('student_login.php');</script>";
				} else {
				    echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
				}
			}
		}
		else
		{
			echo "<script>alert('Sorry, Password doesnot match with Confirmpassword');</script>";
		}
		$conn->close();
	}
?>
