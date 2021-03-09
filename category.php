<!DOCTYPE html>
<html>
<head>
   <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/category.css">
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
        <h2>Problem category details</h2><br>
        <a href="admin.php"><div class="icon">
          <div class="arrow"></div>
        </div></a>
        <div class="box">
          <form method="post" action=""><br>
            Select the problem category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="op">
              <option>select problem category: </option>
              <option value="Overcrowding or Overpopulation">Overcrowding or Overpopulation</option>
              <option value="Unemployment">Unemployment</option>
              <option value="Housing problems">Housing problems</option>
              <option value="Development of slums">Development of slums</option>
              <option value="Sanitation problems">Sanitation problems</option>
              <option value=" Water shortage problems"> Water shortage problems</option>
              <option value="Health hazards">Health hazards</option>
              <option value="Degraded environmental quality">Degraded environmental quality</option>
              <option value="Disposal of trash">Disposal of trash</option>
              <option value="Transportation problems">Transportation problems</option>
              <option value="Urban crime">Urban crime</option>
              <option value="Increased rates of poverty">Increased rates of poverty</option>
            </select>
            <input type="submit" name="sub" class="sub" value="submit">
          </form>


            <table border="1">
          <tr>
            <th><span style="color:black">USERID</span></th>
            <th><span style="color:black">DISTRICT</span></th>
            <th><span style="color:black">TALUK</span></th>
            <th><span style="color:black">TOWN</span></th>
            <th><span style="color:black">ADDRESS</span></th>
            <th><span style="color:black">LANDMARK</span></th>
            <th><span style="color:black">PROBLEMDESCRIPTION</span></th>
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

    $count=0;

    if(isset($_POST['op']))
    {
      $pro=$_POST['op'];

      $result = mysqli_query($conn,"CALL prob_cat('".$pro."')");
      while($row = mysqli_fetch_array($result))
      {
          $count=$count+1;
          echo "<tr>";
          echo "<td>" . $row['userid'] . "</td>";
          echo "<td>" . $row['district'] . "</td>";
          echo "<td>" . $row['taluk'] . "</td>";
          echo "<td>" . $row['town'] . "</td>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['landmark'] . "</td>";
          echo "<td>" . $row['problemdescription'] . "</td>";
          echo "</tr>";
      }
    }
      echo "</table>";
      if(isset($pro))
    echo "<h2 class='show'>Total problems related to ".$pro." is :   ".$count."</h2>";
 mysqli_close($conn);
?>