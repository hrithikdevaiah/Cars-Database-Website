<html>
<body>
<?php
require('config.php');

$sql = "SELECT * FROM cars , engine, gears_and_handling, look, performance, price WHERE cars.id=engine.id AND cars.id=gears_and_handling.id AND cars.id=look.id AND cars.id=performance.id AND cars.id=price.id ORDER BY price.new DESC";

$result = mysqli_query($link,$sql)or die(mysqli_error());
echo '<table align="center" border="1" cellspacing="1" align="center" cellpadding="8">';
echo "<tr><th>id</th><th>Make</th><th>Model</th><th>Series</th><th>Fuel</th><th>Transmission</th><th>Wheel drive</th><th>Top speed</th><th>Acceleration</th><th>New Price</th><th>Pic</th><th>Video</th><th>Website</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $make = $row['make'];
    $model = $row['model'];
    $series = $row['series'];
    $fuel = $row['fuel'];
    $type = $row['type'];
    $wheel_drive = $row['wheel_drive'];
    $topspeed = $row['top_speed'];
    $acceleration = $row['acceleration'];
    $new = $row['new'];
    $pic = $row['pic'];
    $video = $row['video'];
    $link = $row['link'];
    echo "<tr><td>".$id."</td><td>".$make."</td><td>".$model."</td><td>".$series."</td><td>".$fuel."</td><td>".$type."</td><td>".$wheel_drive."</td><td>".$topspeed."</td><td>".$acceleration."</td><td>".$new."</td><td>"."<img src=".$pic." alt=".$pic.' style="width:300px;height:200px;">'."</td><td>".$video."</td><td>"."<a href=".$link.">".$make.$model.$series."</a>"."</td></tr>";
} 

echo "</table>";
mysqli_close($link);
?>
</body>
</html>