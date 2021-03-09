<!DOCTYPE html>
<html>
<head>
   <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/complaintdet.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
   </head>
<body>
    <header>
      <a href='home.php'>LOG OUT</a>
    </header>
      <div class="title">
        <h1>ZERO PROBLEM CITY</h1>
        <h2><u>Complaint details<u></h2><br>
        <a href="admin.php"><div class="icon">
          <div class="arrow"></div>
        </div></a>
        <div class="box">
          <form method="post" action="">
            <p class='p1'>sort by</p> <input class='sub1' type='submit' name='checking' value='problem level'>
            <input class='sub2' type='submit' name='checking' value='date'>
          </form>
            <table border="1">
          <tr>
            <th><span style="color:black">USERID</span></th>
            <th><span style="color:black">DISTRICT</span></th>
            <th><span style="color:black">TALUK</span></th>
            <th><span style="color:black">TOWN</span></th>
            <th><span style="color:black">PROBLEM</span></th>
            <th><span style="color:black">ADDRESS</span></th>
            <th><span style="color:black">LANDMARK</span></th>
            <th><span style="color:black">PROBLEMDESCRIPTION</span></th>
            <th><span style="color:black">PROBLEVEL</span></th>
            <th><span style="color:black">DATE</span></th>
            <th><span style="color:black">IMAGES</span></th>
            <th><span style="color:black">OPERATIONS</span></th>
          </tr>
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


if(isset($_POST['checking']) && $_POST['checking']=='problem level'){
      $result = mysqli_query($conn,"SELECT * FROM service ORDER BY problevel DESC");
      while($row = mysqli_fetch_array($result))
      {
          echo "<tr>";
          echo "<td>" . $row['userid'] . "</td>";
          echo "<td>" . $row['district'] . "</td>";
          echo "<td>" . $row['taluk'] . "</td>";
          echo "<td>" . $row['town'] . "</td>";
          echo "<td>" . $row['problem'] . "</td>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['landmark'] . "</td>";
          echo "<td>" . $row['problemdescription'] . "</td>";
          echo "<td>" . $row['problevel'] . "</td>";
          echo "<td>" . $row['date'] . "</td>";
          echo "<td><a href='imagedet.php?ue=".$row['userid']."&uf=".$row['problem']."'>Images</a></td>";
          echo "<td><a href='complaintdet.php?ue=".$row['userid']."&uf=".$row['problem']."'>Delete</a></td>";
          echo "</tr>";
      }
}

else if(isset($_POST['checking']) && $_POST['checking']=='date'){
      $result = mysqli_query($conn,"SELECT * FROM service ORDER BY date ASC");
      while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['userid'] . "</td>";
        echo "<td>" . $row['district'] . "</td>";
        echo "<td>" . $row['taluk'] . "</td>";
        echo "<td>" . $row['town'] . "</td>";
        echo "<td>" . $row['problem'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['landmark'] . "</td>";
        echo "<td>" . $row['problemdescription'] . "</td>";
        echo "<td>" . $row['problevel'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td><a href='imagedet.php?ue=".$row['userid']."&uf=".$row['problem']."'>Images</a></td>";
        echo "<td><a href='complaintdet.php?ue=".$row['userid']."&uf=".$row['problem']."'>Delete</a></td>";
        echo "</tr>";
    }
}

if(isset($_GET['ue']) && isset($_GET['uf'])){
    $usereid=$_GET['ue'];
    $prob=$_GET['uf'];
    $query= "DELETE service , images  FROM service INNER JOIN images  WHERE service.userid=images.userid and service.userid = '$usereid' and service.problem='$prob' and images.problem='$prob'";
    $data=mysqli_query($conn,$query);
    echo "<h1>".$data."</h1>";
    if($data)
    {
      header("Location:complaintdet.php");
    }
    else
    {
      header("Location:complaintdet.php");
    }
}
echo "</table>";
 mysqli_close($conn);
?>