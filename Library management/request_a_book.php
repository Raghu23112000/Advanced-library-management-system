<?php if(!isset($_SESSION)){
	session_start();
	}
?>

<?php include('header_user1.php'); ?>
<br>
<div>
<h2 style="padding-top:100px;text-align:center;font-size:50px;color:black;" > REQUEST A BOOK </h2>
</div>
<div class="formstyle" style="float: center;padding:25px;background-image: image(picture.jpg);padding-top:100px;margin-right:0px; margin-bottom:30px;">
<form enctype="multipart/form-data" method="post" class="text-center">
   <div class="col-md-12">
     <table style="margin-left:auto;margin-right:auto;">
			 <tr>
				 <td><label><b>Search By :
				 </b></label></td>
				 <td><select name="request" style=" float: center;width: =100%;
					 border: 2px solid #aaa;
					 border-radius: 4px;
					 margin: 8px 0;
					 outline: none;
					 padding: 8px;
					 box-sizing: border-box;" required>
								 <option value="Search By Author">Search By Author</option>
								 <option value="Search By Section">Search By Section</option>
								 <option value="Search By Textbook">Search By Textbook</option>
							 </select></td>
			 </tr>
			 <tr>
        <td><label><b>Enter the text :
        </b></label></td>
        <td><input type="text" name="keyword"  placeholder="writedown a query " required="required" style=" float: center;width: =100%;
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
<button name="submit" type="submit" style="margin-left: 20px;width: 100px;border-radius: 10px; padding: 15px 32px;background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;">Request</button>
</form>
</td>
</tr>
</table>
  </div>
</div>
</div>
<?php
    $email=$_SESSION["email"];
    $_SESSION["email"]=$email;
    //echo "<script>alert('{$email}');</script>";
  ?>

<?php
    include('config.php');
      if(isset($_POST['submit'])){
        if(!empty($_POST['request'])) {
          $selected = $_POST['request'];
          $keyword=$_POST['keyword'];
          $sql="SELECT * FROM book";
          $result=mysqli_query($conn,$sql);
		      $count = mysqli_num_rows($result);
          switch ($selected)
          {
          	case "Search By Author":
                if($count>=1)
                {
                  echo "<table border='1' align='center' text-align='center'   width='80%' cellspacing='0'
                       style='margin-left:auto; margin-right:auto;'>
              <tr>
                <th style='padding: 15px;background-color: black;color: white;' >  Book ID</th>
                <th style='padding: 15px;background-color: black;color: white;' >  Book Name  </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Author Name  </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Section  </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Price  </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Status </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Holder </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Row No  </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Column No </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Return Date </th>
                <th style='padding: 15px;background-color: black;color: white;' >  Request book</th>
              </tr>";
                  while($row=mysqli_fetch_array($result))
                  {
                    if(stripos($row["author"], $keyword)!==false)
                    {
                      echo "<tr>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['book_id']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['bookname']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['author']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['section']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['price']."</td>";
                      if($row['status']==1)
                        $status="Available";
                      else
                        $status="Unavailable";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                      if($row['holder']=="")
                        $holder="none";
                      else
                        $holder=$row['holder'];
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$holder."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['row_no']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['column_no']."</td>";
                      if($row['return_date']=="0000-00-00")
                        $ret='none';
                      else
                        $ret=$row['return_date'];
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$ret."</td>";
                      if($row['status']==1)
                      {
										?>
                      <td> <a href="request.php?book_id=<?php echo $row['book_id'] ?>"  <button name="submit" type="submit"
											style="width: 30px;
											padding: 15px 55px;
											background-color: green;
											color: white;
											cursor: pointer;">Request</button>  </a></td>";
											<?php
                      }
                      else
                        echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                    }
                  }
                  echo "</tr>";
                  echo "</table>";
                }
          		break;
          	case "Search By Section":
                if($count>=1)
                {
									echo "<table border='1' align='center' text-align='center'   width='80%' cellspacing='0'
                       style='margin-left:auto; margin-right:auto;'>
              <tr>
							<th style='padding: 15px;background-color: black;color: white;' >  Book ID</th>
							<th style='padding: 15px;background-color: black;color: white;' >  Book Name  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Author Name  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Section  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Price  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Status </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Holder </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Row No  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Column No </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Return Date </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Request book</th>
              </tr>";
                  while($row=mysqli_fetch_array($result))
                  {
                    if(stripos($row["section"], $keyword)!==false)
                    {
											echo "<tr>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['book_id']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['bookname']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['author']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['section']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['price']."</td>";
                      if($row['status']==1)
                        $status="Available";
                      else
                        $status="Unavailable";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                      if($row['holder']=="")
                        $holder="none";
                      else
                        $holder=$row['holder'];
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$holder."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['row_no']."</td>";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['column_no']."</td>";
                      if($row['return_date']=="0000-00-00")
                        $ret='none';
                      else
                        $ret=$row['return_date'];
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$ret."</td>";
                      if($row['status']==1)
                      {
                    ?>
                      <td> <a href="request.php?book_id=<?php echo $row['book_id'] ?>"  style='padding: 15px;padding-right: 50px;text-align: center;background-color: white;'> Request  </a></td>";
                      <?php
                      }
                      else
                        echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                    }
                  }
                  echo "</tr>";
                  echo "</table>";
                }
          		break;
          	case "Search By Textbook":
                if($count>=1)
                {
									echo "<table border='1' align='center' text-align='center'   width='80%' cellspacing='0'
                       style='margin-left:auto; margin-right:auto;'>
              <tr>
							<th style='padding: 15px;background-color: black;color: white;' >  Book ID</th>
							<th style='padding: 15px;background-color: black;color: white;' >  Book Name  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Author Name  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Section  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Price  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Status </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Holder </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Row No  </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Column No </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Return Date </th>
							<th style='padding: 15px;background-color: black;color: white;' >  Request book</th>
              </tr>";
                  while($row=mysqli_fetch_array($result))
                  {
                    if(stripos($row["bookname"], $keyword)!==false)
                    {
											echo "<tr>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['book_id']."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['bookname']."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['author']."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['section']."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['price']."</td>";
											if($row['status']==1)
                        $status="Available";
                      else
                        $status="Unavailable";
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                      if($row['holder']=="")
                        $holder="none";
                      else
                        $holder=$row['holder'];
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$holder."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['row_no']."</td>";
											echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$row['column_no']."</td>";
											if($row['return_date']=="0000-00-00")
                        $ret='none';
                      else
                        $ret=$row['return_date'];
                      echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$ret."</td>";
                    if($row['status']==1)
                      {
                    ?>
                      <td> <a href="request.php?book_id=<?php echo $row['book_id'] ?>"  style='padding: 15px;padding-right: 50px;text-align: center;background-color: white;'> Request  </a></td>";
                      <?php
                      }
                      else
                        echo "<td style='padding: 15px;text-align: center;background-color: white;'>".$status."</td>";
                    }
                  }
                  echo "</tr>";
                  echo "</table>";
                }
          		break;
          	default:
        		echo 'Please select a correct search option.';
          		break;
          }
        } else {
          echo 'Please select a search option.';
        }
      }
?>
