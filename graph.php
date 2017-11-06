<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1";
?>
<html>
  <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Seconds', 'Values'],
          <?php
            require('config.php');
            require ('fun.php');

            $query="SELECT second, value from minute";//select query for viewing users.  
            $run=mysqli_query($dbcon,$query);//here run the sql query.  
            $a ['cols'][] = ['second', 'value']; 
            $i = 1;
            while ($row = mysqli_fetch_assoc($run)) {
              if($i >1){
                echo ", ";
              }
              $i = $i + 1;
              echo "[";
              echo $row['second'].",".$row['value'];
              echo "]";
            }

          ?>
        ]);

        var options = {
          title: 'Air Quality',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>