<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* More modern font */
            background-color: #f8f9fa; /* Light background */
        }
        h1 {
            font-size: 2.5rem; /* Larger heading */
            color: #34495e; /* Darker heading color */
            text-align: center;
            margin-bottom: 2rem; /* Increased margin */
            font-family: 'Lato', sans-serif;
            font-weight: 300;
        }
        .container {
            /* Removed height: 100vh; - No longer necessary with form */
            padding-top: 2rem; /* Added padding at the top */
            padding-bottom: 2rem;
            background-color: #ffffff; /* Added background color for the form container */
            border-radius: 10px; /* Rounded corners for the form container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the form container */
            margin-top: 2rem; /* Added margin above the container */
        }
        form {
            margin-top: 1rem; /* Added margin above the form elements */
        }
        .form-label {
            font-weight: 500; /* Make labels a bit bolder */
            color: #2c3e50; /* Darker label color */
        }
        .form-control, .form-select {
            border: 1px solid #bdc3c7; /* Lighter border */
            border-radius: 5px; /* Slightly less rounded corners */
            padding: 0.75rem; /* Slightly increased padding */
            transition: border-color 0.3s ease; /* Smooth transition */
            font-size: 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4299e1; /* Highlight border on focus (a nice blue) */
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15); /* Add a subtle shadow */
            outline: none; /* Remove default outline */
        }
        .btn-primary {
            background-color: #4299e1; /* A nice blue color */
            border: none;
            padding: 0.75rem 1.5rem; /* Increased horizontal padding */
            font-size: 1.1rem; /* Slightly larger font */
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%; /* Make button full width */
        }
        .btn-primary:hover {
            background-color: #3182ce; /* Darker shade on hover */
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .btn-primary:active {
            background-color: #2767b3; /* Even darker shade on active */
            transform: translateY(0);
        }
        .col-md-4 {
            margin-bottom: 1.5rem;
        }
        .col-12 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <?php
    include "config.php";
    session_start();
    $user_id = $_SESSION['user_id'];
    $firstname = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    if (isset($_GET["id"])) {
        $uid = $_GET['id'];
        $sql = "SELECT `booking_id`,`name`,`password`, `place`, `phone`, `room_category`, `bedding_category`, `breakfast`, `no_of_rooms`, `check_in`, `check_out`, `hotelname`, `prize` FROM `booked_hotels` WHERE name = '$firstname'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $booking_id = $row["booking_id"];
            $password = $row["password"];
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
            <?php
        }
    }
    if (isset($_POST["update"])) {
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
        $sql = "UPDATE `booked_hotels` SET `name`='$username',`email`='$email',`password`='$password',`place`='$place',`phone`='$phone',`room_category`='$room_category',`bedding_category`='$bedding_category',`breakfast`='$breakfast',`no_of_rooms`='$no_of_rooms',`check_in`='$check_in',`check_out`='$check_out' WHERE booking_id=$booking_id";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            echo "<div class='alert alert-success text-center'>Record Updated Successfully</div>";
            header('Location:track_booking.php');
        } else {
            echo "<div class='alert alert-danger text-center'>Error:" . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    ?>
    <h1 class="mt-5">Update Booking</h1>
    <div class="container">
        <form class="row g-3" method="Post">
            <div class="col-12">
                <label for="inputName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="inputName" name="Name" value="<?php echo $firstname; ?>" placeholder="<?php echo $firstname; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="Email" value="<?php echo $email; ?>" placeholder="<?php echo $user_email; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Confirmation Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="Password" value="<?php echo $password; ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Your Country</label>
                <input type="text" class="form-control" id="inputAddress" value="<?php echo $place; ?>" name="Place">
            </div>
            <div class="col-12">
                <label for="inputphone" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="inputphone" name="Phone" value="<?php echo $phone; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Room Categories</label>
                <select id="inputState" class="form-select" name="room_category" value="<?php echo $room; ?>">
                    <option value="SUPERIOR ROOM" <?php if($room == "SUPERIOR ROOM") echo "selected"; ?>>SUPERIOR ROOM</option>
                    <option value="DELUX ROOM" <?php if($room == "DELUX ROOM") echo "selected"; ?>>DELUX ROOM</option>
                    <option value="GUEST ROOM" <?php if($room == "GUEST ROOM") echo "selected"; ?>>GUEST ROOM</option>
                    <option value="SINGLE ROOM" <?php if($room == "SINGLE ROOM") echo "selected"; ?>>SINGLE ROOM</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Bedding Categories</label>
                <select id="inputState" class="form-select" name="bedding_category" value="<?php echo $bed; ?>">
                    <option value="Single" <?php if($bed == "Single") echo "selected"; ?>>Single</option>
                    <option value="Double" <?php if($bed == "Double") echo "selected"; ?>>Double</option>
                    <option value="Triple" <?php if($bed == "Triple") echo "selected"; ?>>Triple</option>
                    <option value="Quad" <?php if($bed == "Quad") echo "selected"; ?>>Quad</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Breakfast Services</label>
                <select id="inputState" class="form-select" name="breakfast" value="<?php echo $breakfast; ?>">
                    <option value="Meal" <?php if($breakfast == "Meal") echo "selected"; ?>>Meal</option>
                    <option value="Room Only" <?php if($breakfast == "Room Only") echo "selected"; ?>>Room Only</option>
                    <option value="Half Board" <?php if($breakfast == "Half Board") echo "selected"; ?>>Half Board</option>
                    <option value="Full Board" <?php if($breakfast == "Full Board") echo "selected"; ?>>Full Board</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputroomreq" class="form-label">Number Of Rooms Required</label>
                <input type="number" class="form-control" id="inputroomreq" min="1" max="50" value="<?php echo $no_room; ?>" name="Room_no">
            </div>
            <div class="col-md-4">
                <label for="inputcheckin" class="form-label">Check-In</label>
                <input type="date" min="2025-01-01" class="form-control" id="inputcheckin" name="check_in" value="<?php echo $checkin; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputcheckout" class="form-label">Check-Out</label>
                <input type="date" min="2025-01-01" class="form-control" id="inputcheckout" name="check_out" value="<?php echo $checkout; ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YfM6tKz9vLLEqKkI7quOfn4Pimjz6E2qGwrp4iMneTkhzWjVGKVMjaw6oq Foods" crossorigin="anonymous"></script>
</body>
</html>
