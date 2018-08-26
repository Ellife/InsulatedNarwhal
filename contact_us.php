    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

	
		var council= <?php echo json_encode($council_name); ?>;
		council=JSON.parse(council);
		var data_set = <?php echo json_encode($data_set); ?>;
		data_set= JSON.parse(data_set);
		var result = [];
		var json_obj= <?php echo json_encode($table_data); ?>;	
		
		result = JSON.parse(json_obj);
		var data = google.visualization.arrayToDataTable(result);


      var options = {
        title: council + " Avanced Council Data by suburb,
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
  </body>