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
  <h2>Council Selection</h2>
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
		<form method="post" action="index.php?link=council_dataset">
					
		<div class="form-group">
			<label for="user_guide">Select council from map (select one):</label>
			<div id="googft-mapCanvas"></div>
			<!-- <label for="council_name">Select council from list (select one):</label>
			<select class="form-control" id="list_select" name="list_select" value="<?php // echo $council_name; ?>">
			<option>Alpine</option>
			<option>Ararat</option>
			<option>Ballarat</option>
			<option>Banyule</option>
			<option>Bass Coast</option>
			<option>Baw Baw</option>
			<option>Bayside</option>
			<option>Benalla</option>
			<option>Boroondara</option>
			<option>Brimbank</option>
			<option>Buloke</option>
			<option>Campaspe</option>
			<option>Cardinia</option>
			<option>Casey</option>
			<option>Central Goldfields</option>
			<option>Colac Otway</option>
			<option>Corangamite</option>
			<option>Darebin</option>
			<option>East Gippsland</option>
			<option>Frankston</option>
			<option>Gannawarra</option>
			<option>Glen Eira</option>
			<option>Glenelg</option>
			<option>Golden Plains</option>
			<option>Greater Bendigo</option>
			<option>Greater Dandenong</option>
			<option>Greater Geelong</option>
			<option>Greater Shepparton</option>
			<option>Hepburn</option>
			<option>Hindmarsh</option>
			<option>Hobsons Bay</option>
			<option>Horsham Rural</option>
			<option>Hume</option>
			<option>Indigo</option>
			<option>Kingston</option>
			<option>Knox</option>
			<option>Latrobel</option>
			<option>Loddon</option>
			<option>Macedon Ranges</option>
			<option>Manningham</option>
			<option>Mansfield</option>
			<option>Maribyrnong</option>
			<option>Maroondah</option>
			<option>Melbourne</option>
			<option>Melton</option>
			<option>Mildura</option>
			<option>Mitchell</option>
			<option>Moira</option>
			<option>Monash</option>
			<option>Moonee Valley</option>
			<option>Moorabool</option>
			<option>Moreland</option>
			<option>Mornington Peninsula</option>
			<option>Mount Alexander</option>
			<option>Moyne</option>
			<option>Murrindindi</option>
			<option>Nillumbik</option>
			<option>Northern Grampians</option>
			<option>Port Phillip</option>
			<option>Pyrenees</option>
			<option>Queenscliffe</option>
			<option>South Gippsland</option>
			<option>Southern Grampians</option>
			<option>Stonnington</option>
			<option>Strathbogie</option>
			<option>Surf Coast</option>
			<option>Swan Hill</option>
			<option>Towong</option>
			<option>Unincorporated Land</option>
			<option>Wangaratta</option>
			<option>Warrnambool</option>
			<option>Wellington</option>
			<option>West Wimmera</option>
			<option>Whitehorse</option>
			<option>Whittlesea</option>
			<option>Wodonga</option>
			<option>Wyndham</option>
			<option>Yarra</option>
			<option>Yarra Ranges</option>
			<option>Yarriambiack</option>			
			</select> -->
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