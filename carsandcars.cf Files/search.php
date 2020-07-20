<!DOCTYPE html>
<html lang="en">
<title>CARS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }
    
    .w3-quarter img {
        margin-bottom: -6px;
        cursor: pointer
    }
    
    .w3-quarter img:hover {
        opacity: 0.6;
        transition: 0.3s
    }
</style>

<body class="w3-light-grey">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-animate-right w3-top w3-text-light-grey w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
        <a href="javascript:void()" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-32">CLOSE</a>
        <a href="/dbmsproj/" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">Home</a>
        <a href="/dbmsproj/login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">LOGIN</a>
        <a href="/dbmsproj/about.html" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">ABOUT</a>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
        <span class="w3-left w3-padding">CARS & CARS</span>
        <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-content" style="max-width:1600px;margin-top:83px;height:1000px; ">
    <?php
        require('config.php');
        $seastr = $_POST['seastr'];

        $sql = "SELECT * FROM cars , engine, gears_and_handling, look, performance, price WHERE cars.id=engine.id AND cars.id=gears_and_handling.id AND cars.id=look.id AND cars.id=performance.id AND cars.id=price.id AND (cars.make LIKE '%$seastr%' OR cars.model LIKE '%$seastr%')";

        $result = mysqli_query($link,$sql)or die(mysqli_error());
        echo '<table align="center" border="1" cellspacing="1" align="center" cellpadding="8">';
        echo "<tr><th>id</th><th>Make</th><th>Model</th><th>Series</th><th>Year of Production</th><th>Horsepower</th><th>Fuelsystem</th><th>Fuel</th><th>Gear type</th><th>No of Gears</th><th>Wheel drive</th><th>Top speed</th><th>Acceleration</th><th>New Price</th><th>Used Price</th><th>Pic</th><th>Video</th><th>Website</th></tr>";

        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $make = $row['make'];
            $model = $row['model'];
            $series = $row['series'];
            $year_of_prod = $row['year_of_prod'];
            $horsepower = $row['horsepower'];
            $fuelsystem = $row['fuelsystem'];
            $fuel = $row['fuel'];
            $type = $row['type'];
            $no_of_gears = $row['no_of_gears'];
            $wheel_drive = $row['wheel_drive'];
            $topspeed = $row['top_speed'];
            $acceleration = $row['acceleration'];
            $new = $row['new'];
            $used = $row['used'];
            $pic = $row['pic'];
            $video = $row['video'];
            $link = $row['link'];
            echo "<tr><td>".$id."</td><td>".$make."</td><td>".$model."</td><td>".$series."</td><td>".$year_of_prod."</td><td>".$horsepower."</td><td>".$fuelsystem."</td><td>".$fuel."</td><td>".$type."</td><td>".$no_of_gears."</td><td>".$wheel_drive."</td><td>".$topspeed."</td><td>".$acceleration."</td><td>".$new."</td><td>".$used."</td><td>"."<img src=".$pic." alt=".$pic.' style="width:300px;height:200px;">'."</td><td>".$video."</td><td>"."<a href=".$link.">".$make.$model.$series."</a>"."</td></tr>";
        } 

        echo "</table>";
        mysqli_close($link);
    ?>
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }
    </script>


</body>

</html>