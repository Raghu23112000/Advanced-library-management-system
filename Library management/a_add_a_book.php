<?php if(!isset($_SESSION)){
	session_start();
	}
?>

<?php include('header_admin.php'); ?>
<br>
<div>
<h2 style="padding-top:200px;text-align:center;font-size:50px;color:black;" > ADD A BOOK </h2>
</div>
<div class="formstyle" style="float: center;padding:25px;margin-right:0px; margin-bottom:30px;">
<form enctype="multipart/form-data" method="post" class="text-center">
   <div class="col-md-12">
     <table style="margin-left:auto;margin-right:auto;padding-left:50px;">
       <tr>
        <td><label><b>Book name :
        </b></label></td>
        <td><input type="text" name="book_name"  placeholder="Book name" style=" float: center;width: =100%;
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
        <td><input type="text" name="author"  placeholder="Author" required="required" style=" float: center;width: =100%;
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
        <td><input type="text" name="section" value="" placeholder="Section" required="required" style=" float: center;width: =100%;
          border: 2px solid #aaa;
          border-radius: 4px;
          margin: 8px 0;
          outline: none;
          padding: 8px;
          box-sizing: border-box;"required >
        </td>

      <tr>
        <td><label><b>Price :
        </b></label></td>
        <td><input type="number" name="price"  value="" placeholder="Price" style=" float: center;width: =100%;
          border: 2px solid #aaa;
          border-radius: 4px;
          margin: 8px 0;
          outline: none;
          padding: 8px;
          box-sizing: border-box;" required>
        </td>
      </tr>
			<tr>
        <td><label><b>Status :
        </b></label></td>
        <td><input type="number" name="status"  value="" placeholder="Status" style=" float: center;width: =100%;
          border: 2px solid #aaa;
          border-radius: 4px;
          margin: 8px 0;
          outline: none;
          padding: 8px;
          box-sizing: border-box;" required>
        </td>
      </tr>
			<tr>
        <td><label><b>Holder :
        </b></label></td>
        <td><input type="text" name="holder"  value="" placeholder="Holder" style=" float: center;width: =100%;
          border: 2px solid #aaa;
          border-radius: 4px;
          margin: 8px 0;
          outline: none;
          padding: 8px;
          box-sizing: border-box;" required>
        </td>
      </tr>
      <tr>
        <td><label><b>Row number :
        </b></label></td>
        <td><input type="text" name="row"  value="" placeholder="Row number" style=" float: center;width: =100%;
          border: 2px solid #aaa;
          border-radius: 4px;
          margin: 8px 0;
          outline: none;
          padding: 8px;
          box-sizing: border-box;" required>
        </td>
      </tr>
      <tr>
        <td><label><b>Column number :
        </b></label></td>
        <td><input type="text" name="column"  value="" placeholder="Column number" style=" float: center;width: =100%;
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
<button name="submit" type="submit" style="margin-left: 40px;
width: 200px;
border-radius: 10px;
padding: 15px 32px;
background-color: #4CAF50;
color: white;
margin: 8px 0;
border: none;
cursor: pointer;">Add book</button></div>
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
    $book_name=$_POST["book_name"];
    $author=$_POST["author"];
    $section=$_POST["section"];
    $price=$_POST["price"];
    $status="1";
    $row_no=$_POST["row"];
    $column_no=$_POST["column"];

    $sql="INSERT INTO book(bookname,author,section,price,status,row_no,column_no) VALUES
            ( '{$book_name}','{$author}','{$section}','{$price}','{$status}','{$row_no}','{$column_no}' )";
    if($conn->query($sql)==TRUE)
    {
      echo "<script>alert('Congratulations..!!,Successfully Added a Book');</script>";
    } else {
        echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
    }

  }
?>
