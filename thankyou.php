<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="cssfiles/thankyou.css"></link>
    <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
 	  <script type="text/javascript">
 	  function preventBack() { window.history.forward(1); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
 	  </script>
 </head>
	 <title>ZERO PROBLEM CITY</title>
  <body>
    <header>
    	<h1>THANK YOU</h1>
      <a href='home.php'>LOG OUT</a>
    </header> 
  </body>
</html>

<?php
	session_start();
  if($_SESSION['redundant']==1){
    unset($_SESSION['redundant']);
    echo "<h1 class='warn'>Your problem has already been registered</h1>";
      
    } 
    unset($_SESSION['probsol']);
    unset($_SESSION['probrec']);
    unset($_SESSION['count']);
    unset($_SESSION['password']);
?>