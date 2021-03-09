<?php
$con=new mysqli("localhost","hrithik","8526549173@","reg");
$flag=0;

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
 session_start();
 $first=$_SESSION['probrec'];
 $second=$_SESSION['probsol'];
 echo "<div class='box'<h1>Total problems received: ".$first."<br><br>Total problems solved: ".$second."</h1></div>";

if(isset($_POST['radio']) && isset($_POST['1']) && isset($_POST['district']) && isset($_POST['taluk']) && isset($_POST['town']) && isset($_POST['address']) &&
       isset($_POST['landmark']) && isset($_POST['problemdescription']) && isset($_POST['submit']))
{
       $district=$_POST['district'];
       $taluk=$_POST['taluk'];
       $town=$_POST['town'];
       $problem=$_POST['radio'];
       $address=$_POST['address'];
       $landmark=$_POST['landmark'];
       $problemdescription=$_POST['problemdescription'];
       $problevel=$_POST['1'];
       $flag=1;

      session_start();
      $_SESSION['prob']=$problem;
      $_SESSION['redundant']=0;
      if(isset($_SESSION['password'])){
        $forid=$_SESSION['password'];
      }

      $sql = "select * from service where userid ='$forid' AND problem = '$problem'";  
      $result = mysqli_query($con, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);
      if ($count > 0) {
         header("Location:thankyou.php");
         $_SESSION['redundant']=1;
      }

      else{
              $upro=$forid." ".$problem;
              if($stmt = $con->prepare("INSERT INTO service (upro,userid,district,taluk,town,problem,address,landmark,problemdescription,problevel) VALUES (?,?,?,?,?,?,?,?,?,?)")){
                $stmt->bind_param('ssssssssss',$upro,$forid,$district,$taluk,$town,$problem,$address,$landmark,$problemdescription,$problevel);
                $stmt->execute();
                $stmt->close();
                
              }
              if($flag==1)
              {
                $query = "insert into images(uipro,userid,problem,image0,image1,image2) values('".$upro."','".$forid."','".$problem."',0,0,0 )";
                mysqli_query($con,$query);
                header('Location:image.php');
              }
          }
}

mysqli_close($con);  
?>



<html>
    <head>
      <link rel="stylesheet" type="text/css" href="cssfiles/service.css">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>
        <script>
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
            function logout() {
                  var form = document.createElement("form");
                  form.action = "./includes/logout.inc.php";
                  form.method = "post";
                  var sbmt = document.createElement("input");
                  sbmt.name = "logout-submit";
                  form.appendChild(sbmt);
                  document.body.appendChild(form);
                  form.submit();
            }

            function myFunction() {
              document.getElementById("radio").required = true;
              Location="image.php";
            }

            function preventBack() { window.history.forward(1); }
            setTimeout("preventBack()", 0);
            window.onunload = function () { null };
    
        </script>
        <link rel = "icon" href = "cssfiles/free.png" type = "image/x-icon">
    </head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
  <div name="myform" id="myform">
    &nbsp;&nbsp;&nbsp;Select District: <select name="district" class="sep" id="districtsel" size="1" required >
    <option value="" selected="selected" >&nbsp;&nbsp;Select District</option>
    </select>
    <br>
    <br>
    &nbsp;&nbsp;&nbsp;Select taluk:<select name="taluk" class="sep" id="taluksel" size="1" required >
    <option value="" selected="selected">Please select taluk</option>
    </select>
    <br>
    <br>
    &nbsp;&nbsp;&nbsp;Select town/village:<select name="town" class="sep" id="townsel" size="1" required >
    <option value="" selected="selected" >Please select town/village</option>

    </select><br>
  </div>



<div class="name">

 <fieldset id="2">
  <p><u>Select your problem</u>: </p><br>
  <input type="radio" name="radio" id="radio" value="Overcrowding or Overpopulation"> Overcrowding or Overpopulation<br>
  <input type="radio" name="radio" id="radio" value="Unemployment"> Unemployment<br>
  <input type="radio" name="radio" id="radio" value="Housing problems"> Housing problems<br>
  <input type="radio" name="radio" id="radio" value="Development of slums"> Development of slums<br>
  <input type="radio" name="radio" id="radio" value="Sanitation problems"> Sanitation problems<br>
  <input type="radio" name="radio" id="radio" value=" Water shortage problems"> Water shortage problems<br>
  <input type="radio" name="radio" id="radio" value="Health hazards"> Health hazards<br>
  <input type="radio" name="radio" id="radio" value="Degraded environmental quality"> Degraded environmental quality<br>
  <input type="radio" name="radio" id="radio" value="Disposal of trash"> Disposal of trash<br>
  <input type="radio" name="radio" id="radio" value="Transportation problems"> Transportation problems<br>
  <input type="radio" name="radio" id="radio" value="Urban crime"> Urban crime<br>
  <input type="radio" name="radio" id="radio" value="Increased rates of poverty"> Increased rates of poverty<br><br>

  <h2 class="addressh2">address</h2>
  <input class="address" type="text" name="address" required><br><br>

  <h2 class="landmarkh2">landmark</h2>
  <input class="landmark" type="text" name="landmark">

  <div id="Problemdescription">
  <h2>Problem description</h2>
  <input class="pbleminput" type="textarea" name="problemdescription" required>
  </div>
</fieldset>
  <div class="level">
    <fieldset id="1">
    <p><u>Select your level of problem</u>: </p><br>
    <input type="radio" name="1" id="radio1" value="1" >To be solved at its own pace<br>
    <input type="radio" name="1" id="radio1" value="2" >To be solved as soon as possible<br>
    <input type="radio" name="1" id="radio1" value="3" >To be solved immediately<br>
  </fieldset>
</div>
 <input class="sub" type="submit"  name="submit" onclick="myFunction()" value="Submit">
<a class="logout" href="login.php">Logout</a>
</form>
</div>
    </body>
</html>