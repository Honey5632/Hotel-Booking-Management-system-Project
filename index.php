<?php 
session_start(); 
include "config.php";
?>

<?php
if(isset($_POST["signin"]))
{
  
  $email=$_POST["mail"];
  $password=$_POST["pass"];
  $sql = "SELECT `id`, `name`, `email`, `password` FROM `signin` WHERE email='$email' AND password='$password'";

 
  
  // Fetch data from database

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Store data in session
    $_SESSION['user_id'] = $row["id"];
	$_SESSION['user_email'] = $row["email"];
    $_SESSION['user_name'] = $row["name"];
    
    // Redirect to display page
    header("Location: home.php");
    exit();
} 
		elseif ($count == 0) {
			?>
			<div class="alert alert-danger alert-dismissible fade show" style="position: fixed; top: 15%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">
				<strong>Warning:</strong> There is no account with this email and password!!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
			
		} elseif (empty($email) || empty($password)) {
			?>
			<div class="alert alert-danger alert-dismissible fade show" style="position: fixed; top: 15%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">
				<strong>Warning:</strong> Please fill all the fields!!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
		}
		
  

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us!</title>

    <link rel="icon" type="image/x-icon" href="https://static.vecteezy.com/system/resources/previews/038/516/357/non_2x/ai-generated-eagle-logo-design-in-black-style-on-transparant-background-png.png">
    

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}


body {
	background-image:linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.5)), url("https://www.oyorooms.com/blog/wp-content/uploads/2018/02/FE.jpg");
	background-position: center;
	background-size: cover;
	background-repeat: no-repeat;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	/* margin: -20px 0 50px; */
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

/* From Uiverse.io by Yaya12085 */ 
.radio-inputs {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 350px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.radio-inputs > * {
  margin: 6px;
}

.radio-input:checked + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}

.radio-input:checked + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}

.radio-input:checked + .radio-tile .radio-icon svg {
  fill: #2260ff;
}

.radio-input:checked + .radio-tile .radio-label {
  color: #2260ff;
}

.radio-input:focus + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-input:focus + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 60px;
  min-height: 60px;
  border-radius: 5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}

.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.25rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}

.radio-tile:hover {
  border-color: #2260ff;
}

.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-icon svg {
  width: 2rem;
  height: 2rem;
  fill: #494949;
}

.radio-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.radio-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

button {
	border-radius: 20px;
	background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); 
	background-size: cover;
	border: none;
	box-shadow: 1px 1px 20px #fff;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	gap: 10px;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	border-radius: 20px;
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 1px 1px 20px #22222239;
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	/* background-image: url('https://cdn.dribbble.com/userupload/22085340/file/original-9dfcc390b4981a8573b78a063f4905c9.gif'); background-size: cover; */
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	/* color: #FFFFFF; */
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
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



    <h1>Sign in or create an account</h1>
    <p>You can sign in using your Booking.com account to access our services.</p>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="POST">
			<h1>Create Account</h1>


			<!-- If i want to make a gender section-->
			<!-- <div class="radio-inputs">
					<label>
						<input class="radio-input" type="radio" name="engine">
							<span class="radio-tile">
								<span class="radio-icon">
									
								</span>
								<span class="radio-label">Male</span>
							</span>
					</label>
					<label>
						<input checked="" class="radio-input" type="radio" name="engine">
						<span class="radio-tile">
							<span class="radio-icon">
							</span>
							<span class="radio-label">Female</span>
						</span>
					</label>
					<label>
						<input class="radio-input" type="radio" name="engine">
						<span class="radio-tile">
							<span class="radio-icon">
							
							</span>
							<span class="radio-label">Other</span>
						</span>
					</label>
			</div> -->


			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name" />
			<input type="email" placeholder="Email" name="email" />
			<input type="password" placeholder="Password" name="pswd" />
			<button type="submit" name="submit">Register</button>
		</form>
	</div>


    <?php
if(isset($_POST["submit"]))
{

  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["pswd"];
  $id=rand(10000, 99999);

  if (empty($name) || empty($email) || empty($password)) {
	?>
	<div class="alert alert-danger alert-dismissible fade show" style="position: fixed; top: 15%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">Please fill all the fields<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
   <?php
  } else {
	$sql = "INSERT INTO `signin`(`id`, `name`, `email`, `password`) VALUES ('$id','$name','$email','$password')";
	 // Check if the query was successful
	if (mysqli_query($conn, $sql)) {
		?>
		<div class="alert alert-success alert-dismissible fade show" style="position: fixed; top: 15%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">Your Account has been Created! please login to proceed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php 
	}


	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
  }
}

?>



	<div class="form-container sign-in-container">
		<form action="#" method="POST">
			<h1>Sign in</h1>

			
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			
			
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="mail" />
			<input type="password" placeholder="Password" name="pass" />
			<a href="#">Welcome To Our Family</a>
			<button value="signin" type="signin" name="signin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Register</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		By signing in or creating an account, you agree with our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Statement</a>
		<br>
		All rights reserved.<br>
		Copyright (2006-2025) – Booking.com™️
	</p>
</footer>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>





<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>