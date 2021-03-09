<!DOCTYPE html>
<html>
<head>
   <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/registrationdet.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
   <script type="text/javascript">
    function preventBack() { window.history.forward(1); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
   </head>
<body>
    <header>
      <a href='home.php'>LOG OUT</a>
    </header>
      <div class="title">
        <h1>ZERO PROBLEM CITY</h1>
        <h2><u>Registration details<u></h2><br>
        <a href="admin.php"><div class="icon">
          <div class="arrow"></div>
        </div></a>
        <div class="box">
            <table border="1">
          <tr>
            <th><span style="color:black">USERNAME</span></th>
            <th><span style="color:black">AGE</span></th>
            <th><span style="color:black">EMAIL</span></th>
            <th><span style="color:black">OPERATIONS</span></th>
      </div>
    </div>
   </body>
</html>

<?php
$host = "localhost"; /* Host name */
  $user = "hrithik"; /* User */
  $password = "8526549173@"; /* Password */
  $dbname = "reg"; /* Database name */
  $conn = mysqli_connect($host, $user, $password,$dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$result = mysqli_query($conn,"SELECT * FROM user");

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['age'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td><a href='registrationdet.php?em=".$row['email']."'>Delete</a></td>";
echo "</tr>";
}

if(isset($_GET['em'])){
  $uem=$_GET['em'];
  echo "<h1>".$uem."</h1>";
  $query= "DELETE FROM user WHERE email='$uem'";
  $data=mysqli_query($conn,$query);
  if($data)
  {
    header("Location:registrationdet.php");
  }
  else
  {
    header("Location:registrationdet.php");
  }
}
echo "</table>";
 mysqli_close($conn);
?>