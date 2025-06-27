<?php 
session_start();

// Check if session variables exist
if (!isset($_SESSION['user_id'])) {
    echo "No session data found. Please go back and store data first.";
    exit();
}

$user_id = $_SESSION['user_id'];
$firstname = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
include "config.php"; ?>


<?php
if (isset($_POST["submit"])) {
    $booking_id=rand(1000,9999);
    $username = $_POST["Name"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $place = $_POST["Place"];
    $phone = $_POST["Phone"];
    $room_category = $_POST["room_category"];
    $bedding_category = $_POST["bedding_category"];
    $breakfast = $_POST["breakfast"];
    $no_of_rooms = $_POST["Room_no"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $hotelname = "Travelodge Hotel Chandigarh Airport";
    $prize = 10500 * $no_of_rooms;

    // Insert data into the database
    $sql = "INSERT INTO `booked_hotels`(`booking_id`,`name`, `email`, `password`, `place`, `phone`, `room_category`, `bedding_category`, `breakfast`, `no_of_rooms`, `check_in`, `check_out`, `hotelname`, `prize`) 
            VALUES ('$booking_id','$username','$email','$password','$place','$phone','$room_category','$bedding_category','$breakfast','$no_of_rooms','$check_in','$check_out','$hotelname','$prize')";

    if ($conn->query($sql) === true) {
        // Redirect to prevent form resubmission
        header("Location: Hotel_1.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>UrbanNestInn</title>
    <link rel="icon" type="image/x-icon" href="https://static.vecteezy.com/system/resources/previews/038/516/357/non_2x/ai-generated-eagle-logo-design-in-black-style-on-transparant-background-png.png">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0;padding: 0;
        }
        body{
            background-color: #f0f0f0;
        }

        .prevent-select {
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */
        }

        .sty-effect{
          margin: 12px;
          text-align: center;
          border-radius: 10px;
          transition: .5s;
          color: #fff;
        }

        .sty-effect:hover{
          background-color: #fff;
          color: #444;
        }


        .hero{
            background-image: linear-gradient(rgba(0, 114, 255, 0.5), rgba(240, 240, 240, 1)),url("https://www.kayak.co.in/rimg/himg/b3/10/90/ice-178163-120191068-424668.jpg?width=1366&height=768&crop=true");
            background-position: center;
            background-size: cover;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .left{
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }

        .left .left_container{
            border-radius: 10px;
            margin: 10px 10px;
            /* position: absolute; */
            /* top: 50%; */
            /* transform: translateY(-30%); */
            width: 85%;
            background-color: #fff;
            color: rgb(0, 0, 0);
            padding: 35px;
        }
        .left .left_container p{
            font-size: 12px;
        }
        .service-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .service-title {
            font-size: 1.4rem;
            font-weight: 500;
            margin-bottom: 10px;
            color: #333;
        }

        .service-description {
            font-size: 1rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .col-md-6 {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .col-sm-12 {
                margin-bottom: 30px;
            }
        }

        .set_avail{
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            padding: 10px 12px;
            border-radius: 10px;
        }

        .set_avail .set_form{
            display: flex;
            gap: 1em;
            align-items: center;
        }

        .set_avail .set_form input{
            padding: 8px;
            border-radius: 10px;
            border: .5px solid #444;
        }
        .about_money{
            margin-top: 20px;
          display: flex;
          justify-content: space-between;
        }


/* support card  */

.card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
            overflow: hidden; /* Clip any overflowing content */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px; /* Fixed height for consistency */
            object-fit: cover; /* Ensure image fills the space, adjust as needed */
            transition: transform 0.3s; /* Smooth transition on hover */
        }

        .card:hover .card-img-top {
            transform: scale(1.05); /* Slightly scale up the image on hover */
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 10px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .social-icons a {
            color: #0078d7; /* Bootstrap's primary color for social icons */
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #0056b3; /* Darker shade on hover */
        }

        /* Responsive adjustments (optional - handled by Bootstrap, but can be customized) */
        @media (max-width: 992px) {
            .col-md-4 {
                margin-bottom: 30px; /* Add space between cards on medium screens */
            }
        }

        @media (max-width: 768px) {
            .col-sm-6 {
                margin-bottom: 30px; /* Add space between cards on small screens */
            }
        }

        @media (max-width: 576px) {
            .col-12 {
                margin-bottom: 30px; /* Add space between cards on extra small screens */
            }
            .card-title {
                font-size: 1.1rem; /* Smaller title on very small screens */
            }
            .card-text {
                font-size: 0.9rem; /* Smaller text on very small screens */
            }
            .social-icons {
                font-size: 1.25rem; /* Smaller icons on very small screens */
            }
        }



        /* Contact Us section styling */
          /* Contact Us */


          @media (max-width: 768px) {
    .Contact_Us {
      flex-direction: column;
    }
    .Contact_Us .left, .Contact_Us .right {
      width: 100%;
      border-right: none;
      padding: 10px;
    }
    .Contact_Us .right .sty-contact-form {
      width: 100%;
    }
  }

        .Contact_Us{
          margin-top: 15px;
          min-height: 70vh;
          /* background-color: #000; */
          display: flex;
          align-items: center;
        }

        .Contact_Us .left{
          color: #fff;
          border-right:1px solid #fff;
          padding: 15px;
        }

        .Contact_Us .left h1{
          font-size: 60px;
        }

        .Contact_Us .right{
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          padding: 15px;
        }

        .Contact_Us .right .sty-contact-form{
          width: 450px;
        }
        .Contact_Us .right .sty-contact-form input{
          padding: 10px;
          border-radius: 10px;
          border: 1px solid #fff;
          background-color: #fff;
          color: #000;
        }


          /* Footer styling */
          footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
          }

          /* Footer content styling */
          .footer-content {
            text-align: center;
          }

          /* Social link styling */
          .social-links {
            margin-top: 10px;
          }

          .social-links a {
            color: #fff;
            font-size: 30px;
            text-decoration: none;
            margin: 0 10px;
            transition: 0.2s;
          }

          .link_fac:hover{
            color: #2f47fd;
            filter:drop-shadow(1px 1px 20px #2f47fd);
          }
          .link_wha:hover{
            color: #2ffd2f;
            filter: drop-shadow(1px 1px 20px #2ffd2f);
          }
          .link_ins:hover{
            color: #fd2f44;
            filter: drop-shadow(1px 1px 20px #fd2f44);
          }


    </style>
</head>
<body>
<?php
// Display success message if redirected with success=true
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    ?>
    <div class="alert alert-success alert-dismissible fade show" style="position: fixed; top: 20%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">
        <strong>Travelodge Hotel Chandigarh Airport</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><hr><strong>Booking successful: </strong> Your booking has been successfully completed. We will contact you soon for further details. <a href="Account.php" class="alert-link">Click here</a> to go to your account.
    </div>
    <?php
}
?>



    
  <nav class="navbar navbar-expand-lg navbar-light p-3 position-fixed col-md-12" id="navbar" style="z-index: 3; transition: 0.2s; min-width: 100%; background-color: #333333;">
    <a class="navbar-brand" href="home.php" style="display: flex;"><img src="https://cdn.dribbble.com/userupload/21168886/file/original-ee007c0e0a93e35e3a52c2ea3c330a21.gif" alt="logo" style="border-radius: 50px; height: 50px;"></a>
    <button  style=" background-color: #fff; color: #fff;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#Booking">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#CONTACT">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sign_reg sty-effect" href="Account.php" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); border-radius: 10px; background-size: cover; color: #f0f0f0f4; font-weight: bold; border: none;">My Account</a>
        </li>
      </ul>
    </div>
  </nav>



    <div class="col-md-12 hero">
      
    </div>

<span id="Booking"></span>


    <div class="col-md-10 left align-center" style="margin: 0 auto; margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 10px;">
        <div class="left_container">
            <span style="background-color: #fffdfd; padding: 5px; border-radius: 10px;"> Top rated <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span></span>
            <h1 class="text-primary prevent-select" style="margin-top: 10px;">Travelodge Hotel Chandigarh Airport</h1>
            <p>You might be eligible for a Genius discount at Travelodge Hotel Chandigarh Airport. Sign in to check if a Genius discount is available for your selected dates. <br>

            Genius discounts at this property are subject to booking dates, stay dates, and other available deals. <br>
                
            Boasting free WiFi in all rooms and a 24-hour front desk, Travelodge Hotel Chandigarh Airport is situated 2 minutes' drive from Chandigarh Domestic Airport Terminals 1 & 2 and 9 minutes' drive from Chandigarh International Airport Terminal.<br>
                
            Mascot Train Station is 9 minutes' walk from Travelodge Hotel Chandigarh Airport, The Grounds of Alexandria is 8 minutes' drive away, while Eastlakes Shopping Centre is 9 minutes' drive away. Both Royal Randwick Racecourse and Maroubra Beach are 16 minutes' drive away.<br>
                
            Each modern, air-conditioned room at Travelodge Hotel Chandigarh Airport is serviced daily and has a private bathroom with free toiletries, a hairdryer and a shower. Flat-screen TV's have free-to-air channels and tea/coffee making facilities are provided.<br>
                
            Access to laundry facilities and luggage storage is available.</p>
            <h5 class="text-primary prevent-select">Hotel facilities</h5>
            
            
            <div class="container py-5">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="service-card">
                    <i class="fas fa-concierge-bell service-icon"></i>
                    <h3 class="service-title">24/7 Room Service</h3>
                    <p class="service-description">
                        Enjoy round-the-clock dining in the comfort of your room. Our extensive menu caters to all tastes.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="service-card">
                    <i class="fas fa-swimming-pool service-icon"></i>
                    <h3 class="service-title">Infinity Pool</h3>
                    <p class="service-description">
                        Take a dip in our stunning infinity pool with breathtaking views. Open all day for your enjoyment.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="service-card">
                    <i class="fas fa-utensils service-icon"></i>
                    <h3 class="service-title">Fine Dining</h3>
                    <p class="service-description">
                        Savor exquisite culinary creations at our award-winning restaurants. A treat for your taste buds.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="service-card">
                    <i class="fas fa-dumbbell service-icon"></i>
                    <h3 class="service-title">Fitness Center</h3>
                    <p class="service-description">
                        Stay fit and energized in our state-of-the-art fitness center, equipped with modern equipment.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="service-card">
                    <i class="fas fa-wifi service-icon"></i>
                    <h3 class="service-title">Free Wi-Fi</h3>
                    <p class="service-description">
                        Stay connected with our complimentary high-speed Wi-Fi, available throughout the hotel premises.
                    </p>
                </div>
            </div>
        </div>
    </div>

            
            
            <div class="about_money">
                <p class="card-text text-body-secondary">Price for 1 night and 2 adult</p>
                <h5 class="text-success">₹ 10,500</h5>
          </div>
          <!-- <button class="btn" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif');
          background-position: center; background-size: cover; color: #f0f0f0; font-weight: bold;">Book Now</button> -->
        
      </div>

    <div class="container col-md-12">
      <!-- Button trigger modal -->

      <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif');
      background-position: center; background-size: cover; color: #f0f0f0; font-weight: bold;">
        Book Now
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking section</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="Post">

                    <div class="col-12">
                        <label for="inputName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="inputName" name="Name" value="<?php echo $firstname; ?>"  placeholder="<?php echo $firstname; ?>" readonly>
                      </div>

                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail4" name="Email" value="<?php echo $user_email; ?>"  placeholder="<?php echo $user_email; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Confirmation Password</label>
                      <input type="password" class="form-control" id="inputPassword4" name="Password">
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Your Country</label>
                      <input type="text" class="form-control" id="inputAddress" value="Indian" placeholder="Example Your Countery" name="Place">
                    </div>
                    <div class="col-12">
                      <label for="inputphone" class="form-label">Phone no</label>
                      <input type="text" class="form-control" id="inputphone" name="Phone">
                    </div>

                    <div class="col-md-4">
                      <label for="inputState" class="form-label">Room categories</label>
                      <select id="inputState" class="form-select" name="room_category">
                        <option value="SUPERIOR ROOM">SUPERIOR ROOM</option>
                        <option value="DELUX ROOM">DELUX ROOM</option>
                        <option value="GUEST ROOM">GUEST ROOM</option>
                        <option value="SINGLE ROOM">SINGLE ROOM</option>
                      </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="form-label">bedding categories</label>
                        <select id="inputState" class="form-select" name="bedding_category">
                          <option value="Single">Single</option>
                          <option value="Double">Double</option>
                          <option value="Triple">Triple</option>
                          <option value="Quad">Quad</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Breakfast services</label>
                        <select id="inputState" class="form-select" name="breakfast">
                          <option value="Meal">Meal</option>
                          <option value="Room Only">Room Only</option>
                          <option value="Half Board">Half Board</option>
                          <option value="Full Board">Full Board</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="inputroomreq" class="form-label">Number Of Rooms Requirment</label>
                      <input type="number" class="form-control" id="inputroomreq" min="1" max="50" value="1" name="Room_no">
                      </div>

                      <div class="col-md-4">
                        <label for="inputroomreq" class="form-label">Check-In</label>
                      <input type="date"  min="2025-01-01" class="form-control" id="inputroomreq" name="check_in">
                      </div>
                      
                      <div class="col-md-4">
                        <label for="inputroomreq" class="form-label">Check-Out</label>
                      <input type="date"  min="2025-01-01" class="form-control" id="inputroomreq" name="check_out">
                      </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary col-12" name="submit" >Booking Now</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>



      <!-- support team -->

      <div class="container mt-5" style="margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 10px;">
        <h1 class="text-center mb-4 text-secondary">Our Team</h1>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="https://media.hswstatic.com/eyJidWNrZXQiOiJjb250ZW50Lmhzd3N0YXRpYy5jb20iLCJrZXkiOiJnaWZcL3BsYXlcLzBiN2Y0ZTliLWY1OWMtNDAyNC05ZjA2LWIzZGMxMjg1MGFiNy0xOTIwLTEwODAuanBnIiwiZWRpdHMiOnsicmVzaXplIjp7IndpZHRoIjo4Mjh9fX0=" alt="John Doe" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">John Doe</h2>
                        <p class="card-text">Senior Manager</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="https://cdn2.psychologytoday.com/assets/styles/manual_crop_1_1_1200x1200/public/field_blog_entry_images/2018-09/shutterstock_648907024.jpg?itok=1-9sfjwH" alt="Jane Smith" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">Jane Smith</h2>
                        <p class="card-text">Assistant Manager</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-stack-overflow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" alt="Mike Johnson" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">Mike Johnson</h2>
                        <p class="card-text">Marketing Specialist</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





 <!-- Contact_Us section -->


  <!-- Contact_Us section -->

     
  <div class="Contact_Us col-md-12 bg-dark" id="CONTACT">
      
      <div class="left col-md-6">
      <h1>Contact Us</h1>
 <p>If you have any questions or encounter issues with our hotels or website, please don't hesitate to reach out to us. Our team is here to assist you with any concerns or problems you may have. Simply contact us, and we'll be happy to help!</p>
 </div>
 
 <div class="right col-md-6">
 <form method="POST">
    <div class="mb-3 sty-contact-form">
      <label for="exampleFormControlInput1" class="form-label text-light">Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" value='<?php echo $firstname;?>' placeholder="Enter Your Name" name="comp_name">
    </div>
    <div class="mb-6 sty-contact-form">
      <label for="exampleFormControlInput1" class="form-label text-light">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" value='<?php echo $user_email;?>' placeholder="name@example.com" name="comp_email">
    </div>
    <div class="mb-6 sty-contact-form">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tell Me About Your Issue?" name="complaint"></textarea>
    </div>
    <div class="mb-3 sty-contact-form">
      <input type="submit" name="submit_comp" class="btn btn-primary" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); border-radius: 10px; background-size: cover; color: #f0f0f0f4; font-weight: bold; border: none; margin-top: 30px; padding: 10px 15px;">
    </div>
  </form>
 </div>
 </div>

 <?php
if(isset($_POST['submit_comp'])){
  $comp_name = $_POST['comp_name'];
  $comp_email = $_POST['comp_email'];
  $complaint = $_POST['complaint'];
  $complaint_from = "Travelodge Hotel Chandigarh Airport";

  $sql = "INSERT INTO `contact_us`(`name`, `email`, `complaint`, `complaint_from`) VALUES ('$comp_name','$comp_email','$complaint','$complaint_from')";
  $result = mysqli_query($conn, $sql);
  if($result){
    ?>
    <div class="alert alert-success alert-dismissible fade show" style="position: fixed; top: 20%; left: 50%; z-index: 5; transform: translate(-50%, -50%); width: 80%;" role="alert">
        <strong>Your Complaint Has Been Registered!!</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><hr><strong>Thankyour For Your Feedback: </strong>
        <p>We appreciate your feedback and will get back to you as soon as possible.</p>
        <p>For urgent matters, please contact us at our customer service number.<Strong>8968695593</Strong></p>
    </div>
    <?php
  }else{
    echo "<script>alert('There was an error submitting your complaint. Please try again.')</script>";
  }

}
?>



     


      <footer>
        <div class="footer-content">
            <p>&copy; 2025 My Website | All Rights Reserved</p>
            <div class="social-links">
                <a href="#" class="link_fac"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#" class="link_wha"><ion-icon name="logo-whatsapp"></ion-icon></a>
                <a href="#" class="link_ins"><ion-icon name="logo-instagram"></ion-icon></a>
            </div>
        </div>
    </footer>
      

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"         integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>