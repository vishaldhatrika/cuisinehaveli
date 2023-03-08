<!DOCTYPE html>
<html>
<link rel="icon" href="mainlogo.png">
<title>Cuisine Haveli</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<style>
div.gallery {
  border: 1px solid #ccc;
}
div.gallery img:hover {
  opacity: 0.8;
}
div.gallery:hover {
  border: 1px solid #777;
}
div.gallery img {
  width: 100%;
  height: auto;
}
.gold{
background-image: url("goldpic.jpg");
background-size: 1800px 1800px;
}
body {font-family: "Georgia", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 1px;
  font-weight:normal
}
.logotext {
  font: 400 30px/1.3 'Berkshire Swash', Helvetica, sans-serif;
  color: black;
  vertical-align: middle;
  text-shadow: 1px 1px 0px #ededed, 4px 4px 0px rgba(0,0,0,0.15);
}
* {
  box-sizing: border-box;
}
.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar gold w3-padding w3-card" style="letter-spacing:1px;"><div class="logotext">
    <a href="homepage.php" class="w3-bar-item w3-button w3-hover-khaki w3-round">
		
		<img src="mainlogo.png" alt="Logo" style="width:35px;height:35px;"> Cuisine Haveli</a>
		</div>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right">

	  
	  <a href="account.php" class="w3-bar-item w3-button w3-hover-khaki w3-round"><img src="acc.png" alt="Acc" style="width:20px;height:20px;"> My Account</a>
	  <a href="#logout" class="w3-bar-item w3-button w3-hover-khaki w3-round">Log Out</a>
    </div>
	  
 </div>
</div>
<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
<br><br><br><br>

<h1 class="logotext">
Reserve A Table at Cuisine Haveli</h1>

<form action="/action_page.php">
<div class="time">
  Date  
  <input type="date" name="date">
&emsp;&emsp;&emsp;



  <select>
    <option value="0">Select Time:</option>
    <option value="1">10 AM</option>
    <option value="2">11 AM</option>
    <option value="3">12 PM</option>
    <option value="4">1 PM</option>
    <option value="5">2 PM</option>
    <option value="6">3 PM</option>
    <option value="7">4 PM</option>
    <option value="8">5 PM</option>
    <option value="9">6 PM</option>
    <option value="10">7 PM</option>
    <option value="11">8 PM</option>
    <option value="12">9 PM</option>
    <option value="13">10 PM</option>
    <option value="14">11 PM</option>
  </select>
<input type="submit">



<form action="">
<br><br><br>
  <input type="radio" name="table" value="t1"> <img src="1.png"  style="width:100px;height:100px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <input type="radio" name="table" value="t2"> <img src="2.png"  style="width:100px;height:100px;"><br><br>
  <input type="radio" name="table" value="t3"> <img src="3.png"  style="width:100px;height:100px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <input type="radio" name="table" value="t4"> <img src="4.png"  style="width:100px;height:100px;"><br><br>
</form>

</div>
</form>
 
  <hr>

  
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Created by students as a part of Micro Project at <a href="https://www.mlrinstitutions.ac.in" title="MLRIT" target="_blank" class="w3-hover-text-green">MLRIT</a></p>
  <p>Our Team: Kaushik Gupta, Jala Rakesh, Sai Yashwanth Reddy, Vishal Dhatrika
</footer>
</body>
</html>