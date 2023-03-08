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
      <a href="#about" class="w3-bar-item w3-button w3-hover-khaki w3-round">About</a>
      <a href="login.php" class="w3-bar-item w3-button w3-hover-khaki w3-round">Login</a>
      <a href="register.php" class="w3-bar-item w3-button w3-hover-khaki w3-round">Register</a>
      <a href="#gallery" class="w3-bar-item w3-button w3-hover-khaki w3-round">Gallery</a>
	  <a href="#contact" class="w3-bar-item w3-button w3-hover-khaki w3-round">Contact Us</a>
    
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="homebg.png" alt="Homepage Background" width="1600" height="900">
  <div class="w3-display-bottomleft w3-padding-large w3-hide-small">
    <h1 class="w3-xxlarge"><b>Dine at a palace, savour authentic cuisines...</b></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="foodpic.jpg" class="w3-round w3-image w3-round" alt="Food Pic">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Cuisine Haveli</h1><br>
      <h5 class="w3-center">Tradition since 1954</h5>
      <p class="w3-large">With a legacy of more than 60 years and being associated with the royal family since the inception of the Haveli back in 1954, We have maintained the authenticity of the cuisines. Cuisine Haveli is just a class apart!! <br><br>
	  The stunning Durbar Hall, Jade Room and massive 101-seater dining hall bedecked with Belgian chandeliers, and assorted gardens and terraces lend royal decadence to celebratory events and elegance to business meetings. Enjoy afternoon tea on the Jade Terrace, like the Nizam did many years ago.
  </div>
  </div>
  <hr>
  <!-- Gallery Section -->
  <div class="w3-container w3-padding-64" id="gallery">
    <h1>Gallery</h1><br>
	
	
	
	<div class="responsive">
	<div class="gallery">
	<a target="_blank" href="tf1.jpg">
      <img src="tf1.jpg" alt="tf1">
    </a>
	</div>
	</div>
	
	<div class="responsive">
	<div class="gallery">
	<a target="_blank" href="tf2.jpg">
      <img src="tf2.jpg" alt="tf2">
    </a>
   
	</div>
	</div>
  
  
	<div class="responsive">
	<div class="gallery">
	<a target="_blank" href="tf3.jpg">
      <img src="tf3.jpg" alt="tf3">
    </a>
   
	</div>
	</div>
	<div class="responsive">
	<div class="gallery">
	<a target="_blank" href="tf.jpg">
      <img src="tf.jpg" alt="tf">
    </a>
	</div>
	</div>
  
  </div>
  
  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact Us</h1><br>
    
    <p class="w3-text-blue-grey w3-large"><b>Old Haveli,Beside Lifestyle Building, BD Colony, Kundanbagh Colony, Begumpet, Hyderabad, Telangana 500016</b></p>
    <p>You can also contact us by phone at 040 2340 1111 or email support@cuisinehaveli.com</p>
    <div class="gallery">
	<a target="_blank" href="map.png">
      <img src="map.png" alt="map">
    </a>
	</div>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Created by students as a part of Micro Project at <a href="https://www.mlrinstitutions.ac.in" title="MLRIT" target="_blank" class="w3-hover-text-green">MLRIT</a></p>
   <p>Our Team: Kaushik Gupta, Jala Rakesh, Sai Yashwanth Reddy, Vishal Dhatrika
</footer>

</body>
</html>
