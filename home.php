<!DOCTYPE html>
<html>
<head>
  <title>ZERO PROBLEM CITY</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="cssfiles/style.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
</head>
<body>
    <header>
      <div class="main">
           <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="registration.php">register</a></li>
            <li><a href="login.php">login</a></li>
            <li><a href="#about">About us</a></li>       
           </ul>
      </div>
      <div class="title">
        <h1>ZERO PROBLEM CITY</h1>
      </div>
    </header>
</body>
</html>

<?php
$con=new mysqli("localhost","hrithik","8526549173@","reg");
$flag=0;

$query="SELECT COUNT(*) FROM service";
$data1=mysqli_query($con,$query);
$row = mysqli_fetch_array($data1, MYSQLI_ASSOC);
foreach ($row as $value) {
   $first=$value;
 } 


$query="SELECT COUNT(*) FROM problems_solved";
$data2=mysqli_query($con,$query);
$row = mysqli_fetch_array($data2, MYSQLI_ASSOC);   
foreach ($row as $value) {
  $second=$value;
 } 
 $first=$first+$second;

 session_start();
 $_SESSION['probrec']=$first;
 $_SESSION['probsol']=$second;

 echo "<div class='box'<h1>&nbsp;&nbsp;&nbsp;&nbsp;Total problems received: ".$first."      &nbsp;&nbsp;&nbsp;&nbsp; Total problems solved: ".$second."</h1></div>";

 ?>


<!--  --------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<section id="about">
  <div class="container">
    <center><img class="brand"  src="cssfiles/free.png" alt="logo"></center>
  
  <h1 style="text-align: center; padding-bottom:3%;">About Us</h1>
    <div class="row">
      <div class="col-lg-12">
      <h6>
        In today’s world we are facing many problems in our city but we are unable to contact the person who can solve our problem because of which the problems are increasing and without bringing this problems in front of whole society the respective peoples are neglecting these problems and they are masking themselves as the best leader.</h6>
      <h6>The main concept behind this system is to show them how many problems the people of respective leader’s area are facing and bring this in to their notice.From this we
      will be helping the people to express the problems they are facing.
      It is our small initiative to make our city has <b>#zero problem city</b> </h6>

      <h6 style="color: #f56a79;">For further details and queries, contact us at:</h6>

      <h6 style="color: #f56a79;">Email: zeroproblemcity@gmail.com</h6>
      <h6 style="color: #f56a79;">Mobile: 080-8524569713</h6>
      </h6>
      
      </div>
    </div>
  </div>

  </section>