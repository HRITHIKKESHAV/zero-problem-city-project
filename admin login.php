<!DOCTYPE html>
<html>
<head>
	<title>ZERO PROBLEM CITY</title>
	<link rel="stylesheet" type="text/css" href="cssfiles/login.css">
  <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
</head>
<script type="text/javascript">
  if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<body>
	 <header>
      <div class="main">
           <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="registration.php">register</a></li>
            <li class="active"><a href="login.php">login</a></li>
            <li><a href="aboutus.php">About us</a></li>       
           </ul>
      </div>
    </header>
	<div class="box">
		<img src="loginicon.png" class="avatar">
		<h1>Admin login</h1>
	<form action="admin login.php" method="post">
		<input type="email" id="username" name="username" placeholder="Enter Username" required>
		<input type="password" id="password" name="password" placeholder="Enter password" required>
		<input class="sub" type="submit" name="submit" value="login">
	</form>
</div>
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
   
   if(isset($_POST['username']) && isset($_POST['password']))
{   
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);   

        // admin login
        
        $sql = "select *from admin where adminname = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if ($count == 1) {
           header('Location:admin.php');
         } 
        else{   
            echo "<h2> login failed. Invalid username or password.</h2>"; 
            exit(0);
        } 
}    
?>  

