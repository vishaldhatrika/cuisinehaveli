<!DOCTYPE html>
<html>
<link rel="icon" href="mainlogo.png">
<title>Register - Cuisine Haveli</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<style>
body, html {
  height: 100%;
  margin: 0;
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
* {box-sizing: border-box;}
.bg-image {
  background-image: url("homebg.png");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 90%;
  margin-bottom: 25px;
}

.icon {
  padding: 10px;
  background: #831212;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 90%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid #831212;
}

/* Set a style for the submit button */
.btn {
  background-color: #831212;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 90%;
  opacity: 0.8;
  border-radius:25px;
}

.btn:hover {
  opacity: 1;
}
input:hover {
    border: 1px solid #999;
    border-radius: 5px;
}

</style>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar gold w3-padding w3-card w3-round" style="letter-spacing:1px;"><div class="logotext">
    <a href="homepage.php" class="w3-bar-item w3-button w3-round w3-hover-khaki"><img src="mainlogo.png" alt="Logo" style="width:35px;height:35px;"> Cuisine Haveli</a></div>
   
    <div class="w3-right">
      <a href="login.php" class="w3-bar-item w3-button w3-round w3-hover-khaki">Login</a>
      <a href="register.php" class="w3-bar-item w3-button w3-round w3-hover-khaki">Register</a>
      
    
    </div>
  </div>
</div>
<div class="bg-image">
<form action="/action_page.php" style="max-width:500px;margin:auto">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
 	<h2>Register</h2>
  	<div class="input-container w3-round">
    	<i class="fa fa-user icon w3-round"></i>
    	<input class="input-field w3-round" type="text" placeholder="Full Name" name="fullname">
  </div>

  <div class="input-container w3-round">
    <i class="fa fa-envelope icon w3-round"></i>
    <input class="input-field w3-round" type="text" placeholder="Email" name="email">
  </div>
  
   <div class="input-container w3-round">
    <i class="fa fa-phone icon w3-round"></i>
    <input class="input-field w3-round" type="tel" placeholder="Mobile Number" name="number">
  </div>
  
  <div class="input-container w3-round">
    <i class="fa fa-key icon w3-round"></i>
    <input class="input-field w3-round" type="password" placeholder="Password" name="psw">
  </div>
  
<div class="input-container w3-round">
    <i class="fa fa-key icon w3-round"></i>
    <input class="input-field w3-round" type="password" placeholder="Confirm Password" name="psw">
  </div>
  
  <button type="submit" class="btn">Register</button>

</form>
</div>
</body>
</html>
