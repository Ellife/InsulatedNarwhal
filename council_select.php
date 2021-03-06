<?php
  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
?>
<!-- Scripts for map, source: Google Fusion table-->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3"></script>
<script type="text/javascript">
  function initialize() {
    var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
      (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
    if (isMobile) {
      var viewport = document.querySelector("meta[name=viewport]");
      viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
    }
    var mapDiv = document.getElementById('googft-mapCanvas');
    mapDiv.style.width = isMobile ? '100%' : '1100px';
    mapDiv.style.height = isMobile ? '100%' : '600px';
    var map = new google.maps.Map(mapDiv, {
      center: new google.maps.LatLng(-36.69121325584754, 146.10377603266875),
      zoom: 7,
      mapTypeId: google.maps.MapTypeId.ROADMAP     

    });
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

    layer = new google.maps.FusionTablesLayer({
      map: map,
      heatmap: { enabled: false },
      query: {
        select: "col7",
        from: "1DeS_CRdqXfBObn8Wy57JhL3wz66jaOyRA3T9AJld",
        where: ""
      },
      options: {
        styleId: 2,
        templateId: 2
      }
    });

    if (isMobile) {
      var legend = document.getElementById('googft-legend');
      var legendOpenButton = document.getElementById('googft-legend-open');
      var legendCloseButton = document.getElementById('googft-legend-close');
      legend.style.display = 'none';
      legendOpenButton.style.display = 'block';
      legendCloseButton.style.display = 'block';
      legendOpenButton.onclick = function() {
        legend.style.display = 'block';
        legendOpenButton.style.display = 'none';
      }
      legendCloseButton.onclick = function() {
        legend.style.display = 'none';
        legendOpenButton.style.display = 'block';
      }
    }
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
	function updateFunction() {
		var testSelection = document.getElementsByClassName('selection');
		for (var i = 0; i <testSelection.length; i++) {
			document.getElementById('current').value = testSelection[i].innerHTML;
		}
	}		
</script>
<div class="container">  
  <div class="panel panel-default">
    <div class="panel-heading">Council Selection</div>
    <div class="panel-body">
		<form method="post" action="index.php?link=council_dataset">
					
		<div class="form-group">
			<label for="user_guide">Select council from map (select one):</label>
			<div id="googft-mapCanvas"></div>
			
			<br>
			<input type="hidden" name="council_name" id="current" value="None Selected">			
			<div class="btn-group btn-group-justified">
				<div class="btn-group">
					<button type="button" onclick="location.href='index.php?link=main'" class="btn btn-default btn-sm">Home</button>
				</div>
				<div class="btn-group">
					<button type="submit" class="btn btn-default btn-sm" onclick="updateFunction()">NEXT - Data Selection</button>
				</div>
			</div>
		</div>
		<form>

	</div>
 

</div>
</div>