// This Is Just A Demonstration To Show You How Session Variables Move To Another Pages


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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Session Data</title>
</head>
<body>
    <h2>Stored Session Data</h2>
    <p>ID: <?php echo $user_id; ?></p>
    <p>Name: <?php echo $firstname . " " . $email; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
