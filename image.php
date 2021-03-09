	<?php
	$host = "localhost"; /* Host name */
	$user = "hrithik"; /* User */
	$password = "8526549173@"; /* Password */
	$dbname = "reg"; /* Database name */

	// Check connection
	$con = mysqli_connect($host, $user, $password,$dbname);
	// Check connection
	if (!$con) {
	  die("Connection failed: " . mysqli_connect_error());
	}


	session_start();
	  $iforid=$_SESSION['password'];
	  $prob=$_SESSION['prob'];
	  $i=$_SESSION['count'];

	if(isset($_POST['but_upload']) && isset($_SESSION['password']) && isset($_SESSION['count'])){
 
	  $name = $_FILES['file']['name'];
	  $target_dir = "C:\\xampp\htdocs\project\upload/";
	  $target_file = $target_dir . basename($_FILES["file"]["name"]);
	  // Select file type
	  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	  // Valid file extensions
	  $extensions_arr = array("jpg","jpeg","png","gif","jfif");

	  

	  // Check extension
	  if( in_array($imageFileType,$extensions_arr) ){
	 
	    // Convert to base64 
	    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
	    $image= 'data::image/'.$imageFileType.';base64,'.$image_base64;

	    // Insert record
	    if($i==0)
	    {
	    	$query = "UPDATE images SET image0 = '$image' WHERE userid='$iforid' and problem='$prob'";
		    mysqli_query($con,$query);
		    echo "<p>2 left</p>";
		}
		if($i==1)
		{
		    $query = "UPDATE images SET image1 = '$image' WHERE userid='$iforid' and problem='$prob'";
		    mysqli_query($con,$query);
		    echo "<p>1 left</p>";
		}
		if($i==2)
		{
			
			$query = "UPDATE images SET image2 = '$image' WHERE userid='$iforid' and problem='$prob'";
		    mysqli_query($con,$query);
		    header("Location: thankyou.php"); 
		    
		}
	    $_SESSION['count']=$i+1;

	    // Upload file
	    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	  }
 
}
	?>
<!DOCTYPE html>
<html>
<head>
  <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/image.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
</head>
<body>
	<div class="box">
	    <form method="post" action=""  enctype='multipart/form-data'>
	    	<h2>upload the images related to problem</h2><br><br>
		  &nbsp;&nbsp;<input type='file' name='file' multiple /><br><br><br>
		  <input type='submit' value='Submit'id='csubmit' name='but_upload'>
		  <p>
		  <a class="finish" href='thankyou.php'>FINISH</a>
		</form>
	</div>
</body>
</html>

