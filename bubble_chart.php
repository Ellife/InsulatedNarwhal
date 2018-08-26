    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

	
var council= <?php echo json_encode($council_name); ?>;
		council=JSON.parse(council);
		
		var data_set = <?php echo json_encode($data_set); ?>;
		data_set= JSON.parse(data_set);
		
		var json_head = <?php echo json_encode($table_head); ?>;
		var json_data = <?php echo json_encode($table_data); ?>;
		
		table_data = JSON.parse(json_data);
		table_head = JSON.parse(json_head);
		
		
		var data = new google.visualization.DataTable();
		var temp =table_head[0]
	
		data.addColumn('string',temp[0]);
		
		for (i=1;i< temp.length;i++){data.addColumn('number',temp[i]);}

		
		data.addRows(table_data.length);
		
		for (r=0;r<table_data.length;r++){
			var temp_data = table_data[r];
			for (c=0; c<temp_data.length;c++){
				data.setCell(r,c, temp_data[c]);
			}
		}
		hAxis_title = temp[1];
		vAxis_title= temp[2];
		
      var options = {
        title: council + " Avanced Council Data by suburb",
        hAxis: {title:hAxis_title},
        vAxis: {title:vAxis_title},
        bubble: {textStyle: {fontSize: 11}}
      }

     var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
	 
     chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
  </body>