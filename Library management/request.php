<?php if(!isset($_SESSION)){
	session_start();
	}
?>
<?php
    $email=$_SESSION["email"];
    $_SESSION["email"]=$email;
    //echo $email;
    //echo "<script>alert('{$email}');</script>";
  ?>
<?php include('header_user1.php'); ?>
<?php
      include('config.php');
      $sql="SELECT * FROM book where book_id='" . $_REQUEST["book_id"] . "'";

      $q=mysqli_query($conn,$sql);
      $row=mysqli_num_rows($q);

      $data=mysqli_fetch_array($q);
      $book_id=$data[0];
      $book_name=$data[1];
      $author=$data[2];
      $section=$data[3];

      mysqli_close($conn);
?>
<br>
<div>
<h2 style="padding-top:100px;text-align:center;font-size:50px;color:black;" > REQUEST A BOOK </h2>
</div>
		<div class="formstyle" style="float: center;padding:25px;background-image: image(picture.jpg);padding-top:100px;margin-right:0px; margin-bottom:30px;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				 <table style="margin-left:auto;margin-right:auto;">
          <tr>
            <td><label><b>Book ID :
            </b></label></td>
            <td><input type="text" name="book_id"  value="<?php echo $book_id;?>" placeholder="Book name" style=" float: center;width: =100%;
              border: 2px solid #aaa;
              border-radius: 4px;
              margin: 8px 0;
              outline: none;
              padding: 8px;
              box-sizing: border-box;"required>
            </td>
          </tr>
           <tr>
            <td><label><b>Book name :
            </b></label></td>
            <td><input type="text" name="book_name"  value="<?php echo $book_name;?>" placeholder="Book name" style=" float: center;width: =100%;
              border: 2px solid #aaa;
              border-radius: 4px;
              margin: 8px 0;
              outline: none;
              padding: 8px;
              box-sizing: border-box;"required>
            </td>
          </tr>
          <tr>
            <td><label><b>Author :
            </b></label></td>
            <td><input type="text" name="author"  value="<?php echo $author; ?>" placeholder="Author" required="required" style=" float: center;width: =100%;
              border: 2px solid #aaa;
              border-radius: 4px;
              margin: 8px 0;
              outline: none;
              padding: 8px;
              box-sizing: border-box;"required>
            </td>
          </tr>
          <tr>
            <td><label><b>Section :
            </b></label></td>
            <td><input type="text" name="section" value="<?php echo $section;?>" placeholder="Section" required="required" style=" float: center;width: =100%;
              border: 2px solid #aaa;
              border-radius: 4px;
              margin: 8px 0;
              outline: none;
              padding: 8px;
              box-sizing: border-box;"required >
            </td>
          </tr>
          <tr>
            <td><label><b>Return Date :
            </b></label></td>
            <td><input type="Date" name="return_date" placeholder="Return Date" required="required" style=" float: center;width: =100%;
              border: 2px solid #aaa;
              border-radius: 4px;
              margin: 8px 0;
              outline: none;
              padding: 8px;
              box-sizing: border-box;"required >
            </td>
          </tr>
         <tr><td>
				 <br>
	<button name="submit" type="submit" style="margin-left: 20px;width: 100px;border-radius: 10px; padding: 15px 32px;background-color: #4CAF50;color: white;
padding: 14px 20px;margin: 8px 0;
border: none;cursor: pointer;">Request</button>
</form>
</td>
</tr>
</table>
			</div>
	</div>
	</div>
<?php
include('config.php');
if(isset($_POST['submit']))
{
  $return_date=$_POST['return_date'];
  $sql="UPDATE book SET status='0',holder='{$email}',return_date='{$return_date}' WHERE book_id={$book_id}";
  if($result=mysqli_query($conn,$sql))
  {
    echo "<script>alert('thank You Please return book within the Return Date');</script>";
    echo "<script>location.replace('header_user.php');</script>";
  }
  else
    echo "<script>alert('Error While Requesting');</script>";
}
?>
