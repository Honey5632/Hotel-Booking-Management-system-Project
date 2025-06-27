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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">
    
    <title>UrbanNestInn</title>
    <link rel="icon" type="image/x-icon" href="https://static.vecteezy.com/system/resources/previews/038/516/357/non_2x/ai-generated-eagle-logo-design-in-black-style-on-transparant-background-png.png">
    <!--=============== BOOTSTRAP ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap');

      @import url('https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=New+Amsterdam&family=Playwrite+AR:wght@100..400&family=Playwrite+CU:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


      
*{
  margin: 0;
  padding: 0;
  font-family: "Poppins", system-ui;
}

      body{
        background-color: #f0f0f0;
        /* background-image: url(https://marketplace.canva.com/EAGFkmfdLP8/1/0/1600w/canva-brown-bold-background-instagram-post-DwzHWC9oTFs.jpg); */
    background-position: center;
    background-size: cover;
      }
        .sign_reg{
          border: 2px solid #444;
        }

        .hero{
            position: relative;
            background-image:linear-gradient(rgba(0, 0, 0, 0), rgba(240, 240, 240, 1)), url("https://res.cloudinary.com/simpleview/image/upload/v1686072977/clients/milwaukee/VM_Hilton_Plaza_Suite_King_Room_9b5d673a-95c6-445e-ad6b-5ae85e260f18.jpg");
            background-size: cover;
            background-position: center;
            height:99vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .hero .hero-content{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 80%;
            
            /* backdrop-filter: blur(30px); */
            padding: 20px;
            color:rgb(0, 0, 0);
            border-radius: 50px;
            /* border: 1px solid #fff; */
            margin-bottom:20px;
        }
        .hero .hero-content h1{
            font-size: 40px;
            /* position: absolute; */
            color:rgba(0, 0, 0, 0.54);
            /* top: 20%;
            left: 50%; */
            /* transform: translate(-50%, -50%); */
            font-family: "Tangerine", cursive;
            font-weight: 900;
            text-align: center;
        }
        .hero .hero-content p{
            font-size: 20px;
            /* font-family: "Lavishly Yours", cursive; */
            text-align: center;
        }
        .hero .hero-content .btn{
            background-color: #fff;
            color: #000;
            width:100%;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px 20px;
            border: none;
            transition: 0.3s;
            cursor: pointer;
        }
        .hero .hero-content .btn:hover{
            background-color: #000;
            color: #fff;
        }
        .hero .hero-content .btn:focus{
            outline: none;
        }
        .hero .hero-content .btn:active{
            transform: scale(0.95);
        }
        
        .hero .hero-content .btn:focus{
            outline: none;
        }
        .hero .hero-content .btn:active{
            transform: scale(0.95);
        }


        .about_booking{
          display: flex;
          gap: 0.5em;
        }

        .sty-effect{
          margin: 12px;
          text-align: center;
          
          transition: .5s;
          color: #fff;
          border-bottom:1px solid #fff;
        }

        .sty-effect:hover{
          border-radius: 10px;
          background-color: #fff;
        }

        /* .hero .hero-text{
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }*/

        .hero .hero-btn .btn{
          margin-top: 25px;
        }

        .about_hotels_in_chd{
          padding: 25px;
          text-align: center;
        }

        .card_pos{
          
          display: flex;
          justify-content: center;
          margin: 10px 0px;
        }

        .card_hover{
          transition: .2s;
        }

        .card_hover:hover{
          transform: translateY(-2px);
          box-shadow: 15px 15px 30px #bebebe,
                   -15px -15px 30px #ffffff;
          border-radius: 10px;
        }

        .about_money{
          display: flex;
          justify-content: space-between;
        }


        .sty_hotel_info{
          transition: .2s;
        }

        .sty_hotel_info:hover{
          background-color: #0d6dfd17;
        }



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

         /* Footer styling */
         footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            /* margin-top: 15px; */
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
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-light p-3 position-fixed col-md-12" id="navbar" style="z-index: 3; transition: 0.2s; min-width: 100%;">
    <a class="navbar-brand" href="#" style="display: flex;"><img src="https://cdn.dribbble.com/userupload/21168886/file/original-ee007c0e0a93e35e3a52c2ea3c330a21.gif" alt="logo" style="border-radius: 50px; height: 50px;"></a>
    <button  style=" background-color: #fff; color: #fff;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#HOME"><b>Home</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#HOTEL_AREA"><b>Rooms</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#TRANDING"><b>Trending Hotels</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sty-effect" href="#CONTACT"><b>Contact</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center sign_reg sty-effect" href="Account.php" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); border-radius: 10px; background-size: cover; color: #f0f0f0f4; font-weight: bold; border: none;">My Account</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Hero section -->

        <div class="col-md-12 hero" id="HOME">
          
          <div class="hero-content">
              
          <div class="hero-text">
              <h1 class="display-1 text-center">UrbanNestInn</h1>
              <h2 class="display-1 text-center">Welcome to hotel Booking</h2>
              <p class="text-center">Book your stay with us and enjoy the best hospitality in town.</p>
              <p class="text-center">Find the perfect hotel for your next trip.</p>
              <a href="#HOTEL_AREA" class="btn btn-primary">Book Now</a>
            </div>
              
            <!-- <div class="row about_booking">
              <div class="info_area col-md-4">
                <select class="form-select text-secondary" aria-label="Default select example">
                  <option selected>Where are you going?</option>
                  <option value="1">Chandigarh</option>
                  <option value="2">Mohali</option>
                  <option value="3">Zirakpur</option>
                  <option value="3">Punjab</option>
                  <option value="3">Panchkula</option>
                  <option value="3">Haryana</option>
                </select>
              </div>
              <div class="info_area col-md-3">
                <select class="form-select text-secondary" aria-label="Default select example">
                  <option selectedX>Hotel category</option>
                  <option >One Star</option>
                  <option value="2">Two Star</option>
                  <option value="3">Three Star</option>
                  <option value="2">Four Star</option>
                  <option value="3">Five Star</option>
                </select>
              </div>
              <div class="info_area col-md-4">
                <select class="form-select text-secondary" aria-label="Default select example">
                  <option selected>How many people staying?</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            
            <div class="hero-btn">
              <button type="button" class="btn btn-outline-primary pos col-md-12" style="background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); background-size: cover; color: #f0f0f0f4; font-weight: bold; border: none;">Search</button>
            </div>
           -->
          </div>
        
        </div>

        <section class="full_img_style" id="HOTEL_AREA">
      
      <div class="about_hotels_in_chd col-md-12" id="Chd_hotel" >
        <h1 class="">Chandigarh – hotels and places to stay</h1>
        <p>Exiting deals on your first hotel booking </p>
      </div>


<!-- card for more details -->

      <div class="card_pos">
        <div class="card mb-3 card_hover" style="max-width: 70%;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://www.kayak.co.in/rimg/himg/b3/10/90/ice-178163-120191068-424668.jpg?width=1366&height=768&crop=true" alt="" style="height: 100%; width: 100%; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
            </div>
            <div class="col-md-8 sty_hotel_info">
              <div class="card-body">
                <h5 class="card-title"><a href="Hotel_1.php" style="text-decoration: none;">Travelodge Hotel Chandigarh Airport</a></h5>
                  <p class="card-text">Boasting free WiFi in all rooms and a 24-hour front desk, Travelodge Hotel Chandigarh Airport is located 2 minutes' drive from Chandigarh Domestic Airport Terminals 1 & 2 and 9 minutes' drive from Chandigarh.</p>
                  <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></ion-icon><ion-icon name="star"></ion-icon></span>
                  <a href="Hotel_1.php" style="text-decoration: none;"><small>Show more</small></a>
                  <div class="about_money">
                    <p class="card-text"><small class="text-body-secondary">Price for 1 night and 2 adult</small></p>
                    <h5 class="text-success">₹ 10,500</h5>
                  </div>
                  <a class="btn btn-primary" href="Hotel_1.php" role="button">Check availability</a>
              </div>
            </div>
          </div>
        </div>
            
      </div>


      <div class="card_pos">
        <div class="card mb-3 card_hover" style="max-width: 70%;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://www.hoteldel.com/wp-content/uploads/2021/01/hotel-del-coronado-views-suite-K1TOS1-K1TOJ1-1600x900-1.jpg" alt="" style="height: 100%; width: 100%; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
            </div>
            <div class="col-md-8 sty_hotel_info">
              <div class="card-body">
                <h5 class="card-title"><a href="Hotel_2.php" style="text-decoration: none;">Four Seasons Hotel Chandigarh</a></h5>
                  <p class="card-text">Overlooking Chandigarh Harbor, Four Seasons Hotel Chandigarh offers complimentary Premium WiFi, a bar, restaurant, fitness center and swimming pool.</p>
                  <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></ion-icon><ion-icon name="star"></ion-icon></span>
                  <a href="Hotel_2.php" style="text-decoration: none;"><small>Show more</small></a>
                  <div class="about_money">
                    <p class="card-text"><small class="text-body-secondary">Price for 1 night and 2 adult</small></p>
                    <h5 class="text-success">₹ 23,750.67</h5>
                  </div>
                  <a class="btn btn-primary" href="Hotel_2.php" role="button">Check availability</a>
              </div>
            </div>
          </div>
        </div>
            
      </div>


      <div class="card_pos">
        <div class="card mb-3 card_hover" style="max-width: 70%;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://www.gybevents.in/images/services/hotel.jpg" alt="" style="height: 100%; width: 100%; border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
            </div>
            <div class="col-md-8 sty_hotel_info">
              <div class="card-body">
                <h5 class="card-title"><a href="Hotel_3.php" style="text-decoration: none;">Meriton Suites Sussex Street, Chandigarh</a></h5>
                  <p class="card-text">Overlooking Chandigarh Harbor, Four Seasons Hotel Chandigarh offers complimentary Premium WiFi, a bar, restaurant, fitness center and swimming pool.</p>
                  <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></ion-icon><ion-icon name="star"></ion-icon></span>
                  <a href="Hotel_3.php" style="text-decoration: none;"><small>Show more</small></a>
                  <div class="about_money">
                    <p class="card-text"><small class="text-body-secondary">Price for 1 night and 2 adult</small></p>
                    <h5 class="text-success">₹ 13,469.71</h5>
                  </div>
                  <a class="btn btn-primary" href="Hotel_3.php" role="button">Check availability</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    
      </section>


     <!-- first sliding card section -->
     <section class="container bg-light" id="TRANDING" style="margin-top: 20px; padding: 20px; border-radius: 10px;">
        <div class="card__container swiper">
          <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; margin: 10px 0px;">
            <h3 class="text-dark">Most-booked hotels in Chandigarh in the past month</h3>
          </div>
    
           <div class="card__content">
              <div class="swiper-wrapper">
                 <article class="card__article swiper-slide">
                    <div class="card__image">
                       <img src="https://mmhotels.in/wp-content/uploads/2024/01/istockphoto-104731717-612x612-1.jpg" alt="image"
                       height="200px" class="card__img">
                       <div class="card__shadow"></div>
                    </div>
     
                    <div class="card__data">
                       <h3 class="card__name">Kell Dawx</h3>
                       <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span>
                       <p class="card__description">
                          Passionate about development and design, 
                          I carry out projects at the request of users.
                       </p>
     
                    </div>
                 </article>
     
                 <article class="card__article swiper-slide">
                    <div class="card__image">
                      <img src="https://www.travelandleisure.com/thmb/Xl3T0mAtFnOxtSdHxa-t0SYGJWw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/TAL-six-senses-rome-bar-SSROME0524-7da3d914a9fc4be793f937bac7b12189.jpg" alt="image"
                      height="200px" class="card__img">
                       <div class="card__shadow"></div>
                    </div>
     
                    <div class="card__data">
                       <h3 class="card__name">Lotw Fox</h3>
                       <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span>
                       <p class="card__description">
                          Passionate about development and design, 
                          I carry out projects at the request of users.
                       </p>
     
                    </div>
                 </article>
     
                 <article class="card__article swiper-slide">
                    <div class="card__image">
                      <img src="https://costar.brightspotcdn.com/dims4/default/b3e892d/2147483647/strip/true/crop/2100x1400+0+0/resize/2100x1400!/quality/100/?url=http%3A%2F%2Fcostar-brightspot.s3.us-east-1.amazonaws.com%2F7f%2F00%2F214bfc3e4c4da67455459b913317%2F20240614-fbtrends-crescent-ft-worth-bluediningroom2-0167.jpg" alt="image"
                      height="200px" class="card__img">
                       <div class="card__shadow"></div>
                    </div>
     
                    <div class="card__data">
                       <h3 class="card__name">Sara Mit</h3>
                       <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span>
                       <p class="card__description">
                          Passionate about development and design, 
                          I carry out projects at the request of users.
                       </p>
     
                    </div>
                 </article>
     
                 <article class="card__article swiper-slide">
                    <div class="card__image">
                      <img src="https://media.cnn.com/api/v1/images/stellar/prod/150414124726-best-hotel-bars-champagne-room.jpg?q=w_1110,c_fill" alt="image"
                      height="200px" class="card__img">
                       <div class="card__shadow"></div>
                    </div>
     
                    <div class="card__data">
                       <h3 class="card__name">Jenny Wert</h3>
                       <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span>
                       <p class="card__description">
                          Passionate about development and design, 
                          I carry out projects at the request of users.
                       </p>

                    
                    </div>
                 </article>

                 <article class="card__article swiper-slide">
                    <div class="card__image">
                      <img src="https://media.gq.com/photos/591b12479fe30f3d4ab0879e/master/pass/best-hotel-bars-nomad.jpg" alt="image"
                      height="200px" class="card__img">
                       <div class="card__shadow"></div>
                    </div>
     
                    <div class="card__data">
                       <h3 class="card__name">Lexa Kin</h3>
                       <span class="text-warning"><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon></span>
                       <p class="card__description">
                          Passionate about development and design, 
                          I carry out projects at the request of users.
                       </p>
     
                    </div>
                 </article>
              </div>
           </div>

           <!-- Navigation buttons -->
           <div class="swiper-button-next">
              <i class="ri-arrow-right-s-line"></i>
           </div>
           
           <div class="swiper-button-prev">
              <i class="ri-arrow-left-s-line"></i>
           </div>

           <!-- Pagination -->
           <div class="swiper-pagination"></div>
        </div>
     </section>



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

  </div>

</div>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit_comp'])){
  $comp_name = $_POST['comp_name'];
  $comp_email = $_POST['comp_email'];
  $complaint = $_POST['complaint'];
  $complaint_from = "Website";

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

  

<!-- Footer -->
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
  

<!-- Internal javascript -->
<script>
    let lastScrollTop = 0;
    navbar = document.getElementById("navbar");
    window.addEventListener("scroll", function
    (){
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (screenTop > lastScrollTop){
            navbar.classList.add('icon');
        } else {
            navbar.classList.remove('icon');
        }
        lastScrollTop = screenTop;
    })

</script>
<script>
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.background = "#333333";
  } else {
    document.getElementById("navbar").style.background = "none";
  }
}
</script>

      
    

      <!--=============== SWIPER JS ===============-->
      <script src="assets/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>

      <!--=============== icons ===============-->
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <!--=============== BOOTSTRAP ===============-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


  </body>
</html>