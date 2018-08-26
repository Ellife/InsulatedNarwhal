
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
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
			
			console.log(temp_data);
			
			for (c=0; c<temp_data.length;c++){
				data.setCell(r,c, temp_data[c]);
				//console.log(data.setCell(r,c));
			}
			
		}
		
		//var data = google.visualization.arrayToDataTable(table_data);
	

        var options = {
          chart: {
            title: council,
            subtitle: data_set,
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div class="panel-body" id="columnchart_material" style="width: 1000px; height: 1000px;"></div>

