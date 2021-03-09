<!DOCTYPE html>
<html>
<head>
	 <title>ZERO PROBLEM CITY</title>
   <link rel="stylesheet" type="text/css" href="cssfiles/admin.css">
   <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
   <script type="text/javascript">

        var stateObject = {
        "Bengaluru": {         "Anekal":["Anekal ","Attibele","Bommasandra","Dommasandra","Hebbagodi","Jigani ","Maragondahalli","Sarjapura"],
            "Bangalore North":["BBMP(Munciple Corporation)","Chikkabanavara","Chikkabidarakallu","Hunasamaranahalli","Kadigenahalli ","Madanaiyakanahalli "],
            "Bangalore South":["Agara","Ajjanahalli","Alakabelalu","Badamanavarthekaval","Bettadasanapura","Bheemanakuppe","Bheemanakuppe- Ramasagara","Byalalu","Bychaguppe","Chalaghatta","Channenahalli","Chikkanahalli","Chikkellur","Chikkellur Ramapura","Chikkellur Venkatapura","Chinnakurchi","Cholanaikanahalli","Chunchanakuppe","Devagere","Devamachahalli Narayanapura","Devamachohalli","Doddabele","Doddamaranahalli","Doddanagamangala","Dodderi","Donnenahalli","Ganapathihalli","Gangappanahalli","Gangasandra","Gangenahalli","Ganukal","Gonipura","Gudimavu","Gulakamale","Hampapura","Hommadevanahalli","Honniganahatti","Huluvenahalli","Jogerahalli","K. Chudahalli","Kaggalipura","Kambipura","Kaniminike","Karigiripura","Kempagondanahalli","Kenchanapura","Kengeri Gollahalli","Kethohalli","Kethohalli Narasimhapura","Kethohalli Ramapura","Kolur","Kolur Gururayanapura","Kolur Nanjundapura","Kommaghatta","Kommaghatta - Krishnasagara","Krishnarajapura","Kumbalagodu Gollahalli","Kurubarahalli","Kurubarapalya","M.Krishnasagara","Madapatna","Maligondanahalli","Mallasandra","Maragondanahalli","Marenahalli","Muddaiahnapalya","Mylasandra","Naganahalli","Naganayakanahalli","Nelaguli","Nettigere","O.B.Chudahalli","Peddanapalya","Punagumaranahalli","Puradapalya","Rachanamadu","Ramohalli","Ravugodlu","Seegehalli","Seshagiripura","Somanahalli","Sulikere","Sulivara","Sulivara Ramapura","Sunkadakatte","Tavakadahalli","Tavarekere","Thagachaguppe","Tharalu","Thattaguppe","Thippagondanahalli","Thippur","Uttarahalli -Manavarthekaval","Uttari","Vadahalli","Vaddarapalya","Varthur","Varthur Narasimhapura","Vasanthanahalli","Venkatapura","Vittasandra","Yalachaguppe Ramapura","Yelachaguppe"],
            "Bangalore East":["BBMP","Adur","Anagalapura","Avalahalli","Bandapura","Bandebommasandra","Bendiganahalli","Bidarahalli","Bidare Agrahara","Bommenahalli","Byappanahalli","Cheemasandra","Chikkabanahalli","Chikkakannalli","Chikkanayakanahalli","Chikkasandra","Doddabanahalli","Doddenahalli","Dommasandra","Goravigere","Gundur","Hadosiddapura","Halanayakanahalli","Halehalli","Hancharahalli","Hirandahalli","Huskur","Huvinane","Jothipura","Kachamaranahalli","Kada Agrahara","Kadusonnappanahalli","Kammasandra","Kannamangala","Katamnallur","Kattugollahalli","Khaji Sonnenahalli","Kithiganur","Kodathi","Kodigehalli","Konadasapura","Kurudusonnenahalli","Lagumenahalli","Mandur","Maragondanahalli","Mittaganahalli","Mulluru","Nadagowdagollahalli","Nimbekaipura","Raghuvanahalli","Rampura","Seegehalli","Shringaripura","Sulikunte","Thirumenahalli","Vaderahalli","Valepura","Vanajanahalli","Veerenahalli","Yerappanahalli"]},
            }

           window.onload = function () {
                            var districtsel = document.getElementById("districtsel"),
                            taluksel = document.getElementById("taluksel"),
                            townsel = document.getElementById("townsel");
                            for (var dis in stateObject) {
                            districtsel.options[districtsel.options.length] = new Option(dis, dis);
                            }
            districtsel.onchange = function () {
                                taluksel.length = 1;// remove all options bar first
                                townsel.length = 1; // remove all options bar first
                                if (this.selectedIndex < 1) return; // done 
                                for (var tal in stateObject[this.value]) {
                                    taluksel.options[taluksel.options.length] = new Option(tal, tal);
                                }
            }
            districtsel.onchange(); // reset in case page is reloaded
            taluksel.onchange = function () {
                                townsel.length = 1; // remove all options bar first
                                if (this.selectedIndex < 1) return; // done 
                                var tow = stateObject[districtsel.value][this.value];
                                for (var i = 0; i < tow.length; i++) {
                                    townsel.options[townsel.options.length] = new Option(tow[i], tow[i]);
                                }
                    }
            }
   </script>

</head>
<body>
	 <header>
      <a href='home.php'>LOG OUT</a>
    </header>
      </div>
      <div class="title">
        <h1>ZERO PROBLEM CITY</h1>
        <h2><u>Admin page<u></h2><br>
      </div>
      <div class="alig">
        <form method="post" action="">
        <div name="myform" id="myform">
            Select District:&nbsp;&nbsp;&nbsp; <select name="district" class="sep" id="districtsel" size="1" required >
            <option value="no" selected="selected" >&nbsp;&nbsp;Select District</option>
            </select>
            <br>
            <br>
            Select taluk:&nbsp;&nbsp;&nbsp;<select name="taluk" class="sep" id="taluksel" size="1">
            <option value="no" selected="selected">Please select taluk</option>
            </select>
            <br>
            <br>
            Select town/village:&nbsp;&nbsp;&nbsp;<select name="town" class="sep" id="townsel" size="1" >
            <option value="no" selected="selected" >Please select town/village</option>
            </select><br>
            <input type="submit" class="sub" name="submit">
          </div>
          <div class="ans">
            <p><br>District<br>Taluk<br>Town/Village<br>No of problems</p>
          </div><br>


      </form>
      <div class="comp">
          <p>Complaint details</p>
          <a href='complaintdet.php' class="so">Click here</a>
      </div>
      <div class="regdt">
          <p>Registration details</p>
          <a href='registrationdet.php' class="so">Click here</a>
      </div>
      <div class="cat">
          <p>Details according to problem category<br><br></p>
          <a href='category.php' class="so">Click here</a>
      </div>
    </div>
</body>
</html>
<?php
$host = "localhost"; /* Host name */
  $user = "hrithik"; /* User */
  $password = "8526549173@"; /* Password */
  $dbname = "reg"; /* Database name */
  $con = mysqli_connect($host, $user, $password,$dbname);
  // Check connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $n=0;
      if(isset($_POST['district']) && isset($_POST['taluk']) && isset($_POST['town']))
      {    
           $district=$_POST['district'];
           $taluk=$_POST['taluk'];
           $town=$_POST['town'];
           
        if($district!="no" && $taluk!="no" && $town!="no")
        {
           $n=1;
           $district=$_POST['district'];
           $taluk=$_POST['taluk'];
           $town=$_POST['town'];
           echo "<h3>".$district."<br>".$taluk."<br>".$town."<h3>";
        }
        else if($district!="no" && $taluk!="no")
        {
           $n=2;
           $district=$_POST['district'];
           $taluk=$_POST['taluk'];
           echo "<h3>".$district."<br>".$taluk."<br>-----<h3>";
        }
        else if($district!="no")
        {
           $n=3;
           $district=$_POST['district'];
           echo "<h3>".$district."<br>-----<br>-----<h3>";
        } 

  switch ($n) {       
  case 1: $sql = "select * from service where district ='$district' AND taluk = '$taluk' AND town = '$town'";  
          $result = mysqli_query($con, $sql);  
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
          $count = mysqli_num_rows($result);
          if ($count > 0) {
             echo "<h3><br><br><br>".$count."<h3>";
          }
          else
             echo "<h3><br><br><br>".'0'."<h3>";
    
          break;
  case 2: $sql = "select * from service where district ='$district' AND taluk = '$taluk'";  
          $result = mysqli_query($con, $sql);  
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
          $count = mysqli_num_rows($result);
          if ($count > 0) {
             echo "<h3><br><br><br>".$count."<h3>";
          }
          else
             echo "<h3><br><br><br>".'0'."<h3>";
          break;
  case 3: $sql = "select * from service where district = '$district'";  
          $result = mysqli_query($con, $sql);  
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
          $count = mysqli_num_rows($result);
          if ($count > 0) {
             echo "<h3><br><br><br>".$count."<h3>";
           }
           else
             echo "<h3><br><br><br>".'0'."<h3>";
          break;
      }

      $list=array("Anekal"=>0,"Bangalore North"=>0,"Bangalore South"=>0,"Bangalore East"=>0);

      foreach($list as $x => $x_value) {
         $sql="select count(*) from service where taluk='".$x."'";
         $result = mysqli_query($con, $sql);
         $row = mysqli_fetch_array($result);
         $list[$x]=$row[0];
    }
    arsort($list);
    $keys = array_keys($list);
    
    echo "<div class='box'>&nbsp;&nbsp;&nbsp;&nbsp;<u>Max problems</u> <br>".$list[$keys[0]]." in ".$keys[0]."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;<u>Min problems</u><br>".$list[$keys[3]]." in ".$keys[3]."</div>";
}

  mysqli_close($con);
?>

