<!DOCTYPE html>
<html>
<head>
  <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/imagedet.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
</head>
<body>
    <header>
      <a href="admin.php"><div class="icon">
          <div class="arrow"></div>
        </div></a>
      <div class="title">
        <h1>ZERO PROBLEM CITY</h1>
      </div>
      <div class='box'>
        <h2>Uploaded Images</h2>
      </div>
    </header>
</body>
</html>

<?php
    $host = "localhost";  
    $user = "hrithik";  
    $password = '8526549173@';  
    $db_name = "reg";  
        
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    if(isset($_GET['ue']) && isset($_GET['uf'])){
       $userid=$_GET['ue'];
       $prob=$_GET['uf'];
       $sql = "select * from images where userid='$userid' and problem='$prob'";
       $result = mysqli_query($con,$sql);
       $row = mysqli_fetch_array($result);
    }
    
    if($row[3]=='0' && $row[4]=='0' && $row[5]=='0'){
      echo "<h1 class='no'>No images have been uploaded</h1>";
    }

    else if($row[3]!='0' && $row[4]!='0' && $row[5]!='0'){
      echo "<img  class='first' src=".$row[3]." height=400 width=400 >";
      echo "<img  class='second' src=".$row[4]." height=400 width=400>";
      echo "<img  class='third' src=".$row[5]." height=400 width=400>";
    }

    else if($row[3]!='0' && $row[4]!='0'){
      echo "<img  class='first2' src=".$row[3]." height=400 width=400>";
      echo "<img  class='third2' src=".$row[4]." height=400 width=400>";
    }

    else if($row[3]!='0'){
      echo "<img  class='second' src=".$row[3]." height=400 width=400>";
  }

?>

  