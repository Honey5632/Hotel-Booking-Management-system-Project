<?php 
session_start();

// Check if session variables exist
if (!isset($_SESSION['user_id'])) {
    echo "No session data found. Please go back and store data first.";
    exit();
}

$user_id = $_SESSION['user_id'];
$firstname = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
include "config.php"; ?>

<?php

if(isset($_POST["delete"])){

  
$sql="DELETE FROM `signin` WHERE id=$user_id";
$result=mysqli_query($conn, $sql);

header('Location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="https://static.vecteezy.com/system/resources/previews/038/516/357/non_2x/ai-generated-eagle-logo-design-in-black-style-on-transparant-background-png.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      
    @import url('https://fonts.googleapis.com/css?family=Roboto:900,300');
    @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');

        /* From Uiverse.io by elijahgummer */ 
        *{
            padding: 0;
            margin: 0;
        }



        nav{
     top: 0;
     z-index: 7;
      position: sticky;
      grid-area: navbar;
      background: #fff;
      color: #fff;
      padding: 1em;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-family: "Satisfy", cursive;
      /* z-index: 1; */
    }


    nav .logout_section .sty_btn_nav{
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: rgb(255, 52, 52);;
      font-weight: bold;
      transition: .2s;
    }

    nav .logout_section .sty_btn_nav:hover{
      
      box-shadow: 1px 1px 20px rgb(255, 52, 52);
    }


body {
  background-color: #fff;
  font-family: roboto;
  height: auto;
}
.container {
  backdrop-filter: blur(80px);
  border-radius: 30px;
  padding: 30px;
  box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  margin: 50px auto;
  max-width: 650px;
  text-align: center;
  position: relative;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  
  box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff;
}
.container:hover {
  transform: translateY(-2.5px);
}
.container:hover .avatar-flip {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
}
.container:hover .avatar-flip img:first-child {
  opacity: 0;
}
.container:hover .avatar-flip img:last-child {
  opacity: 1;
}
.avatar-flip {
  border-radius: 100px;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -60px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  box-shadow: 0 0 0 13px #f0f0f0;
  -webkit-box-shadow: 0 0 0 13px #f0f0f0;
  -moz-box-shadow: 0 0 0 13px #f0f0f0;
}
.avatar-flip img {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 100px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
}
.avatar-flip img:first-child {
  z-index: 1;
}
.avatar-flip img:last-child {
  z-index: 0;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  opacity: 0;
}
h2 {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #333;
}
h4 {
  font-size: 13px;
  color: #00baff;
  letter-spacing: 1px;
  margin-bottom: 25px
}
p {
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 20px;
  color: #000;
}

.btn {
  background-color:rgba(255, 255, 255, 0.53);
  color: #000;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  transition: .2s;
}
.btn:hover {
  background-color:rgb(255, 255, 255);
  box-shadow: 1px 1px 20px #ffffff;
}


.delete_info{
  backdrop-filter: blur(80px);
    border-radius: 30px;
    padding: 30px;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
    margin: 50px auto;
    max-width: auto;
    text-align: center;
    position: relative;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
}

.delete_info:hover {
  box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff;
  transform: translateY(-2.5px);
}
.delete_info strong{
  font-size: 20px;
  color: #000;
  margin-bottom: 10px;
}
.delete_info p{
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 20px;
  color: #000;
}

.delete_info button{
  /* background-color:rgba(255, 255, 255, 0.53); */
  /* color: #000; */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  transition: .2s;
}
.delete_info button:hover {
  box-shadow: 1px 1px 20px rgb(255, 0, 0);
}


footer {
    /* position: fixed; */
    background-color:#fff;
    padding: 10px 0;
    position: relative;
    color: #222;
    font-size: 8px;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}


footer a {
    color: #8b3cbf;
    text-decoration: none;
}

    

    </style>
</head>
<body>


<nav>
    <div class="logo"><a class="navbar-brand" href="home.php"><img src="https://cdn.dribbble.com/userupload/21168886/file/original-ee007c0e0a93e35e3a52c2ea3c330a21.gif" alt="logo" height="60px" style="border-radius: 50px;"></a></div>

    <div class="heading"><h2><u>MyAccount</u></h2></div>

    <div class="logout_section">
      <a class="btn sty_btn_nav" href="index.php">LogOut</a>
    </div>

  </nav>

<main style="background: #fff; display: flex; justify-content: center; align-items: center; height: auto; width: 100%; padding: auto;">
  
<div class="area" style="display: flex; justify-content: center; align-items: center; height: auto; width: 80%;background-image:url('https://i.makeagif.com/media/6-26-2022/Kcv935.gif'); background-size: cover; background-position: center; border-radius: 30px;  flex-direction: column;">
  
<div class="container">
<div class="avatar-flip">
    <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" height="150" width="150">
    <img src="https://cliply.co/wp-content/uploads/2020/08/442008110_GLANCING_AVATAR_3D_400px.gif" height="150" width="150">
  </div>

  <h2><p>ID: <?php echo $user_id; ?></p></h2>
  <h4><p>Name: <?php echo $firstname; ?></p></h4>
  <h4><p>Email: <?php echo $email; ?></p></h4>
  <p>Welcome to your account. Here you can manage your bookings and personal information.</p>
  <p>Account ID: <?php echo $user_id?></p>
  <p></p>

  <form method='Post'>
  <input type="button" class="btn col-12" style="margin-bottom: 10px;" name="track" value="Track Your Bookings" onclick="document.location='track_booking.php'">
  <input type="button" class="btn col-12" style="margin-bottom: 10px;" name="update" value="Update" onclick="document.location='update.php'">
  </form>
  <!-- <button class="btn btn-primary col-12" style="margin-bottom: 10px;"name="track">Track Your Bookings</button>
  <button class="btn btn-primary col-12" style="margin-bottom: 10px;">Update</button> -->
</div>
<form method="POST">
<div class="delete_info">
<strong>Warning</strong>
  <P>If you want to delete your account it will permanently deleted form this website</P>
<button class="btn col-6" style="margin-bottom: 10px; background-color: rgb(255, 52, 52); color:rgb(255, 255, 255); font-weight: bold;" name="delete">Delete Account</button>
</div>
</form>



</main>




</div>
</div>
</div>
<footer>
    <p>
      <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Help</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
    </p>
	<p>
		By signing in or creating an account, you agree with our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Statement</a>
		<br>
		All rights reserved.<br>
		Copyright (2006-2025) – Booking.com™️
	</p>
</footer>


<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>