
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <title>WEATHER FORECAST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="videobg.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
        
			* {
				margin: 0;
				padding: 0;
			}

			body {
				font-family: Calibri, sans-serif;
        color:white;
			}

			.background-wrap {
				position: fixed;
				z-index: -1000;
				width: 100%;
				height: 100%;
				overflow: hidden;
				top: 0;
				left: 0;
			}
			
			#video-bg-elem {
				position: absolute;
				top: 0;
				left: 0;
				min-height: 100%;
				min-width: 100%;
			}


			.content {
				position: absolute;
				width: 100%;
				min-height: 100%;
				z-index: 1000;
				background-color: rgba(0,0,0,0.7);
			}
			
      .con{
        Layout-display:
      }
        </style>
    
    </head>
<body style="background-color: rgba(0,0,0,0.7);">
  <div class="background-wrap" id="69">
    <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
      <source src="Beach11.mp4" type="video/mp4">
      Video not supported
    </video>          
  </div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" >
    <!-- Brand -->
    <img class="navbar-brand" src="Weather Extension Logo.png" width="50px" height="50px" title="ACCu weather"></img>
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 2</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Dropdown link
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
    </ul>
    <form class="form-inline " action="index.php" method="post">
      <input class="form-control mr-sm-2" name="cityid" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    <span class="navbar-text" id="demo">
      <button onclick="getLocation()">Try It</button>
    </span>
  </nav>
  <script type="text/javascript">
  var count=3
  if (count<4)
  {
    document.getElementById(69).innerHTML='<video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted">
      <source src="RooftopClouds.mp4" type="video/mp4">
      Video not supported
    </video>'
  }

  </script>
  
  <?php
    
    $api_key="000f10150675d07a15845fbdefee16b6";
    $cityid="mumbai";
    if (isset($_POST["cityid"]))
    {
      $cityid=$_POST['cityid'];
    }
    $url="http://api.openweathermap.org/data/2.5/weather?q=" .$cityid. "&lang=en&units=metric&APPID=" .$api_key;
    //echo $url;
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,0);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl,CURLOPT_VERBOSE,false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    $res=curl_exec($curl);
    curl_close($curl);
    $data=json_decode($res);
    //echo"ravi";
    //print_r($data);
    $currentTime=time();

    //echo $data->main->temp;

  ?>
  <br>
 <div class="content">
 <center><h2>Weather Report </h2></center>
    <div class="col-md-offset-3 col-md-6 col-xs-12">
       <div> <h1 style="color:white"><?php echo $data->main->temp; ?>&deg;C</h1>
        <img src="http://api.openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"class="weather-icon" />

      <h4 style="color:white">
          <?php echo "  ".ucwords($data->weather[0]->description); ?>
      </h4>
      <div>
        <h4 style="color:white">
          <?php echo $data->name;echo ",";echo $data->sys->country; ?>
        </h4>
      </div>

      <h4 style="color:white">
        <div><?php echo date("l g:i a",$currentTime) ?></div>
      </h4>

      <h4 style="color:white">
        <div><?php echo date("jS F, Y",$currentTime) ?></div>
      </h4>
<br><br>
      <span style="font-size:20px">Details:</span>
    <div class="row">
    <div class="col-md-4" style="font-size:25px">Pressure : <?php echo $data->main->pressure; ?>mB</div>
    <div class="col-md-offset-2 col-md-4" style="font-size:25px">Humidity : <?php echo $data->main->humidity; ?></div>
    </div>
    <div class="row">
    <div class="col-md-4" style="font-size:25px">Feels-like : <?php echo $data->main->feels_like; ?></div>
    <div class="col-md-offset-2 col-md-4" style="font-size:25px">Wind speed : <?php echo $data->wind->speed; ?>km/h</div>
    </div>
  </div> 
  </div>
</div>      
</body>
</html>
