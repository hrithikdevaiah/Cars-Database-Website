<html>
<body>
<?php
require('config.php');

$sql = "SELECT * FROM cars , engine, look, price WHERE cars.id=engine.id AND cars.id=look.id AND cars.id=price.id AND engine.fuel LIKE '%gasoline%'";

$result = mysqli_query($link,$sql)or die(mysqli_error());
echo '<table align="center" border="1" cellspacing="1" align="center" cellpadding="8">';
echo "<tr><th>id</th><th>Make</th><th>Model</th><th>Series</th><th>Fuelsystem</th><th>Fuel</th><th>New Price</th><th>Used Price</th><th>Pic</th><th>Video</th><th>Website</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $make = $row['make'];
    $model = $row['model'];
    $series = $row['series'];
    $fuelsystem = $row['fuelsystem'];
    $fuel = $row['fuel'];
    $new = $row['new'];
    $used = $row['used'];
    $pic = $row['pic'];
    $video = $row['video'];
    $link = $row['link'];
    echo "<tr><td>".$id."</td><td>".$make."</td><td>".$model."</td><td>".$series."</td><td>".$fuelsystem."</td><td>".$fuel."</td><td>".$new."</td><td>".$used."</td><td>"."<img src=".$pic." alt=".$pic.' style="width:300px;height:200px;">'."</td><td>".$video."</td><td>"."<a href=".$link.">".$make.$model.$series."</a>"."</td></tr>";
} 

echo "</table>";
mysqli_close($link);
?>
</body>
</html>