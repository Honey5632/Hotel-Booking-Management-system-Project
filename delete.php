<html>
	<head><title></title></head>
<body>
<?php
include "config.php"; 
session_start();
if (isset($_GET["id"])){
$uid=$_GET['id'];
$sql="DELETE FROM `booked_hotels` WHERE `booking_id`=$uid";
$result=mysqli_query($conn, $sql);

header('Location:track_booking.php');
}
?>


</body>

</html>