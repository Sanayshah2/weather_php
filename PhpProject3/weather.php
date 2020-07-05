<?php
$api_key="000f10150675d07a15845fbdefee16b6";
$cityid="mumbai";
$durl="http://api.openweathermap.org/data/2.5/forecast?q=".$cityid."&APPID=".$api_key;
echo $durl;
$curl_set=curl_init();
curl_setopt($curl_set,CURLOPT_URL,0);
curl_setopt($curl_set,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl_set,CURLOPT_URL,$durl);
curl_setopt($curl_set,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl_set,CURLOPT_VERBOSE,false);
curl_setopt($curl_set,CURLOPT_SSL_VERIFYPEER,false);
$dres=curl_exec($curl_set);
curl_close($curl_set);
$ddata=json_decode($dres);
// echo"<pre>";
// print_r($ddata);
$i=0;
while($i!=30)
{
    $list[]=$ddata->list[$i]->main->temp;
    $time[]=$ddata->list[$i]->dt_txt;
    //echo $time[$i]."<br>";
    $i++;
}
?>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>
<body>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBackgroundColor);
        var js_array = [<?php echo '"'.implode('","', $list).'"' ?>];
        var time = [<?php echo '"'.implode('","', $time).'"' ?>];
        console.log(time[0]);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Time');
      data.addColumn('number', 'Temperature');

      data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Temperature'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }</script>
  <div id="chart_div"></div>
</body>
</html>



    

