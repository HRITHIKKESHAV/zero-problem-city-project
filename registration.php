<!DOCTYPE html>
<html>
<head>
	<title>ZERO PROBLEM CITY</title>
	<link rel="stylesheet" type="text/css" href="cssfiles/registration.css">
	<link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
	<script>
		function ffunction(){
	    	alert("You are already a member")
	    	return false;
	    }

	    // Function to check Whether both passwords 
	    // is same or not.
	    function checkPassword(form){
	        password1 = form.password.value; 
	        password2 = form.confirmpassword.value; 
	        // If password not entered
	        if (password1 == '') 
	            alert ("Please enter Password"); 
	              
	        // If confirm password not entered 
	        else if (password2 == '') 
	            alert ("Please enter confirm password"); 
	              
	        // If Not same return False.     
	        else if (password1 != password2) { 
	            alert ("\nPassword did not match: Please try again...") 
	            return false;
	        }

	        else{
	        	return true;
	        } 

	        }
        </script>
</head>

<body>
	<header>
      <div class="main1">
           <ul>
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="registration.php">register</a></li>
            <li><a href="login.php">login</a></li>
            <li><a href="home.php#about">About us</a></li>       
           </ul>
      </div>
    </header>
	<div class="regform"><h1>Registration Form</h1></div>
	<div class="main">
		<form action="" method="post" onSubmit = "return checkPassword(this)">
			<div id="name">
				<h2 class="name">Name</h2>
				<input class="firstname" type="text" name="firstname" required><br>
				<label class="firstlabel">first name</label>
				<input class="lastname" type="text" name="lastname">
				<label class="lastlabel">last name</label>

				<h2 class="ageh2">age</h2>
				<input class="age" type="text" name="age" required>

				<h2 class="emailh2">email</h2>
				<input class="email" type="email" name="email" required>

				<h2 class="passwordh2">password</h2>
				<input class="password" type="password" size="8" minlength="8" maxlength="15" name="password"  value="" required >
				<span id = "message" style="color:red"> </span>

				<h2 class="confirmpasswordh2">confirm<br>password</h2>
				<input class="confirmpassword" type="password" size="8" minlength="8" maxlength="15" name="confirmpassword" required>

				<input class="sub" type="submit" name="submit" value="Submit">
			</div>
		</form>
	</div>
	
</body>
</html>

<?php

$con=new mysqli("localhost","hrithik","8526549173@","reg");

$flag=0; 

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['email'])  && isset($_POST['password']) && isset($_POST['confirmpassword']))
{
	$firstname=$_POST['firstname'];
	 $lastname=$_POST['lastname'];
	 $username=$firstname." ".$lastname;
	 $age=$_POST['age'];
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	 $confirmpassword=$_POST['confirmpassword'];
	 $flag=1;
	 $usename=$firstname.' '.$lastname;

    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);

 	//used to search the data in the user table to check wheather the data already exits or not
    $sql = "select *from user where email= '$email'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    
     
	if ($con -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}	
	if($stmt = $con->prepare("INSERT INTO user(username,age,email,password,confirmpassword) VALUES (?,?,?,?,?)") and $count==0){
		$stmt->bind_param('sisss',$username,$age,$email,$password,$confirmpassword);
		$stmt->execute();
		$stmt->close();
	}


	if($flag==1 && $count>=1)
	{
		echo "<script type='text/javascript'>ffunction();</script>";
	}

	if($flag==1 && $count==0)
	{
		header("Location: service.php"); 
		
	}

}	

	mysqli_close($con);
?>


