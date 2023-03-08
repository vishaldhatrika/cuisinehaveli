<!DOCTYPE html>
<html>
<link rel="icon" href="mainlogo.png">
<title>Cuisine Haveli</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<style>
body {
  font-family: Arial, sans-serif;
  
  background-size: cover;
  height: 100vh;
}

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
input[type=number] {
  width: 8%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
 
  color: white;
}
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



<section class="menu"><h2 class="menu_title">Menu</h2>
				<div class="menu_section menu_section_1"><h3>Main Course</h3>
						<div class="menu_item menu_item_1">
							<h4 class="name">Biryani</h4>
							<p class="price" align="right">₹250 <br><input type="number" name="q1" placeholder="0" class="w3-khaki" min="0" max="5"></p>
							
							
							<hr>
						</div>
					
						<div class="menu_item menu_item_1">
							<h4 class="name">Butter Chicken</h4>
							<p class="price" align="right">₹199<br><input type="number" name="q2" placeholder="0" class="w3-khaki" min="0" max="5"></p>
							 

							
							<hr>
						</div>
					
						<div class="menu_item menu_item_1">
							<h4 class="name">Vegetable Pulao</h4>
							<p class="price" align="right">₹199<br><input type="number" name="q3" placeholder="0" class="w3-khaki" min="0" max="5"></p>

							<hr>
						</div>
					
						<div class="menu_item menu_item_1">
							<h4 class="name">Paneer Butter Masala</h4>
							<p class="price" align="right">₹199<br><input type="number" name="q4" placeholder="0" class="w3-khaki" min="0" max="5"></p>
							
							<hr>
						</div>
					</div>
					<div class="menu_section menu_section_2"><h3>Starters</h3>
						<div class="menu_item menu_item_1">
							<h4 class="name">Mughlai Nawabi Chilli Chicken</h4>
							<p class="price" align="right">₹249<br><input type="number" name="q5" placeholder="0" class="w3-khaki" min="0" max="5"></p>
							
							<hr>
						</div>
					
						<div class="menu_item menu_item_1">
							<h4 class="name">Murgh Malai Kabab</h4>
							<p class="price" align="right">₹199<br><input type="number" name="q6" placeholder="0" class="w3-khaki" min="0" max="5"></p>
							
							<hr>
						</div>
						
					</div>
					<p align="center">
					
					


<!-- End page content -->

<div class="box">

	<a href="#popup1" class=" w3-button w3-khaki w3-round w3-hover-green hpbottom">Order</a></p>
</div>


<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Confirm your Order</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<a href= "" class=" w3-button w3-khaki w3-round w3-hover-green hpbottom">Confirm and Pay </a>
		</div>
	</div>
</div>
</div>
</section>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Created by students as a part of Micro Project at <a href="https://www.mlrinstitutions.ac.in" title="MLRIT" target="_blank" class="w3-hover-text-green">MLRIT</a></p>
  <p>Our Team: Kaushik Gupta, Jala Rakesh, Sai Yashwanth Reddy, Vishal Dhatrika
</footer>
</body>
</html>