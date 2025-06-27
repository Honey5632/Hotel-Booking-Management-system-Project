<?php
include "config.php"; 
session_start();

// Check if session variables exist
if (!isset($_SESSION['user_id'])) {
    echo "No session data found. Please go back and store data first.";
    exit();
}

$user_id = $_SESSION['user_id'];
$firstname = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8y7j2z5l5e5c5e5e5e5e5e5e5e5e5e5e5e5" crossorigin="anonymous">
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    nav{
     top: 0;
      position: sticky;
      grid-area: navbar;
        background: #ffffff;
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
      background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); 
      background-position: center;
        background-size: cover;
      font-weight: bold;
      transition: .2s;
    }

    nav .logout_section .sty_btn_nav:hover{
      
      box-shadow: 1px 1px 20px rgb(52, 255, 255);
    }

    .container{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        height: 70vh;
        padding: 20px;
        background: #e0e0e0;
        border-radius: 30px;
        width: 100%;
      }

      .container .detail_headline{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        gap: 20px;
        margin-bottom: 15px;
      }
      .container .detail_headline h1{
        font-size: 40px;
        color: #333;
      }

      .card {
        margin-top: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
        width: 390px;
        height: 354px;
        border-radius: 30px;
      transition: 0.5s;
      }
      
      .card:hover{
        box-shadow: 15px 15px 30px #bebebe,
                   -15px -15px 30px #ffffff;
                   transform: translateY(-2.5px);
      }
      .card form{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        gap: 20px;
        width: 100%;
        height: 100%;
      }
      .card form input{
        width: 90%;
        height: 50px;
        border-radius: 10px;
        border: none;
        padding: 0 20px;
        font-size: 18px;
        outline: none;
        /* background: #e0e0e0; */
        transition: 0.5s;
      }
      .card form input:focus{
        background: #ffffff;
        box-shadow: 15px 15px 30px #bebebe,
                   -15px -15px 30px #ffffff;
      }


      
footer {
    /* position: fixed; */
    background-color:rgba(255, 255, 255, 0.8);
    padding: 10px 0;
    position: relative;
    color: #222;
    font-size: 12px;
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
    
        <div class="heading"><h2><u>Update Details</u></h2></div>
    
      </nav>
    

    <div class="container">
        
        <div class="detail_headline">
            <h1>Update Profile</h1>
    <p>Update your profile information</p>
        </div>

    <div class="card">
        <form method="POST">
        
        <input type="text"  placeholder="Username" name="username" value="<?php echo $firstname; ?>" placeholder="<?php echo $firstname; ?>">
        
        <input type="email" placeholder="Email" name="email"  value="<?php echo $user_email; ?>" placeholder="<?php echo $user_email; ?>">
        
        <input type="password" placeholder="Passowrd" name="password">
        
        <button value="update" type="update" name="update" style="width: 80%; border: none; border-radius: 15px; padding: 15px;">UPDATE</button>
        
    </div>
        </form>
<?php       
if(isset($_POST["update"])){
$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
	

$sql="UPDATE `signin` SET `name`='$name',`email`='$email',`password`='$password' WHERE id=$user_id";

$result=$conn->query($sql);

if($result==TRUE){
echo "Record Updated Successfully";
	
}
else
{
echo "Error:" .sql."<br>" .$conn->error;
}	
}
?>


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