<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "donut";
$dbname = "cars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_POST['id'];
$make = $_POST['make'];
$model = $_POST['model'];
$series = $_POST['series'];
$year_of_prod = $_POST['year_of_prod'];
$horsepower = $_POST['horsepower'];
$fuelsystem = $_POST['fuelsystem'];
$fuel = $_POST['fuel'];
$type = $_POST['type'];
$no_of_gears = $_POST['no_of_gears'];
$wheel_drive = $_POST['wheel_drive'];
$topspeed = $_POST['topspeed'];
$acceleration = $_POST['acceleration'];
$new = $_POST['new'];
$used = $_POST['used'];
$pic = $_POST['pic'];
$video = $_POST['video'];
$link = $_POST['link'];

$sql = "INSERT INTO cars (id, make, model, series, year_of_prod)
VALUES ($id, '$make', '$model', '$series', '$year_of_prod');";
$sql .= "INSERT INTO engine (id, horsepower, fuelsystem, fuel)
VALUES ($id, $horsepower, '$fuelsystem', '$fuel');";
$sql .= "INSERT INTO performance (id, top_speed, acceleration)
VALUES ($id, $topspeed, $acceleration);";
$sql .= "INSERT INTO price (id, new, used)
VALUES ($id, $new, $used);";
$sql .= "INSERT INTO look (id, pic, video, link)
VALUES ($id, '$pic', '$video', '$link');";
$sql .= "INSERT INTO gears_and_handling (id, type, no_of_gears, wheel_drive)
VALUES ($id, '$type', $no_of_gears, '$wheel_drive')";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully
    $id, '$make', '$model', '$series', '$year_of_prod', $horsepower, '$fuelsystem', '$fuel', $topspeed, $acceleration, $new, $used, '$pic', '$video', '$link', '$type', $no_of_gears, '$wheel_drive'";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Added</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome to CARS & CARS.</h1>
    </div>
    <p>
        <a href="welcome.php" class="btn btn-info">Back to HOME</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>