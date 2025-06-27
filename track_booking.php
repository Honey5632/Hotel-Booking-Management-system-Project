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
$email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        * {
            margin: 0;
            padding: 0;
        }

        nav {
            top: 0;
            position: sticky;
            background: #ffffff;
            color: #fff;
            padding: 1em;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "Satisfy", cursive;
        }

        nav .logout_section .sty_btn_nav {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-image: url('https://25.media.tumblr.com/c81ac310171f3100e7de81d6260224cb/tumblr_mkztvhAAnR1qarc7ho1_500.gif'); 
            background-position: center;
            background-size: cover;
            font-weight: bold;
            transition: .2s;
            text-decoration: none;
        }

        nav .logout_section .sty_btn_nav:hover {
            box-shadow: 1px 1px 20px rgb(52, 255, 255);
        }

        body {
            font-family: 'lato', sans-serif;
            background-color: #fff;
            height: 97vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            /* height: 100vh; */
        }

        h1 {
            font-size: 50px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 40px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
       

        table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 16px;
            font-family: 'Roboto', sans-serif;
            color: #333;
            font-weight: 300;
            transition: background-color 0.3s ease;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .table-row {
            transition: background-color 0.3s ease;
        }
        .table-row:hover {
            background-color: #e0e0e0;
        }
        .btn-danger {
            /* padding: 0px 0px; */
            text-align: center;
            text-decoration: none;
            display: flex;
            font-size: 16px;
            /* margin-top: 4px; */
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }


        footer {
            background-color: rgba(255, 255, 255, 0.8);
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
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            color: #333;
            line-height: 1.5;
            padding: 0 20px;
        }

        footer a {
            color: #8b3cbf;
            text-decoration: none;
        }
    </style>
    <title>Booking Details</title>
</head>
<body>
<nav>
    <div class="logo">
        <a class="navbar-brand" href="home.php">
            <img src="https://cdn.dribbble.com/userupload/21168886/file/original-ee007c0e0a93e35e3a52c2ea3c330a21.gif" alt="logo" height="60px" style="border-radius: 50px;">
        </a>
    </div>
</nav>

<?php
$sql = "SELECT `booking_id`,`name`,`password`, `place`, `phone`, `room_category`, `bedding_category`, `breakfast`, `no_of_rooms`, `check_in`, `check_out`, `hotelname`, `prize` FROM `booked_hotels` WHERE name = '$firstname'";
$result = mysqli_query($conn, $sql);
?>  

<div class="container col-md-8">
    <h1 style="width: 100%; font-size: 100px;">Booking Details</h1>
    <h2>Welcome <?php echo $firstname; ?></h2>
    <h2 style="background-color:rgba(0, 0, 0, 0.5); color: #fff; padding: 10px 20px; border-radius: 50px;">Booking Information</h2>
    
    <table class="table" style="width: 80%; margin-top: 20px; border-radius: 10px; overflow: hidden;">
        <tr>
            <th>Booking ID</th>
            <th>First Name</th>
            <th>Place</th>
            <th>Phone</th>
            <th>Room Category</th>
            <th>Bedding Category</th>
            <th>Breakfast</th>
            <th>No of Rooms</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Hotel Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $booking_id = $row["booking_id"];
                
                $place = $row["place"];
                $phone = $row["phone"];
                $room = $row["room_category"];
                $bed = $row["bedding_category"];
                $breakfast = $row["breakfast"];
                $no_room = $row["no_of_rooms"];
                $checkin = $row["check_in"];
                $checkout = $row["check_out"];
                $hotel = $row["hotelname"];
                $price = $row["prize"];
                ?>
                <tr class="table-row">
                    <td><?php echo $booking_id; ?></td>
                    <td><?php echo $firstname; ?></td>
                    <td><?php echo $place; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $room; ?></td>
                    <td><?php echo $bed; ?></td>
                    <td><?php echo $breakfast; ?></td>
                    <td><?php echo $no_room; ?></td>
                    <td><?php echo $checkin; ?></td>
                    <td><?php echo $checkout; ?></td>
                    <td><?php echo $hotel; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $row["booking_id"];?>">Update</a>&nbsp;&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row["booking_id"];?>">Delete</a></td>
	
                          </tr>
            <?php 
            }
        }
        ?>
    </table>
    
</div>



 




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"         integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
