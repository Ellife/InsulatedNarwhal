<?php
  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
?>
<div class="container">
  <h2>Council Selection</h2>
  <div class="panel panel-default">
    <div class="panel-heading">Council Selection</div>
    <div class="panel-body">
		<form method="post" action="index.php?link=council_dataset">  
		<div class="form-group">
			<label for="council_name">Select Council From List (select one):</label>
			<select class="form-control" id="council_name" name="council_name" value="<?php echo $council_name; ?>">
			<option>Alpine Shire Council</option>
			<option>Ararat Rural City Council</option>
			<option>Ballarat City Council</option>
			<option>Banyule City Council</option>
			<option>Bass Coast Shire Council</option>
			<option>Baw Baw Shire Council</option>
			<option>Bayside City Council</option>
			<option>Benalla Rural City Council</option>
			<option>Boroondara City Council</option>
			<option>Brimbank City Council</option>
			<option>Buloke Shire Council</option>
			<option>Campaspe Shire Council</option>
			<option>Cardinia Shire Council</option>
			<option>Casey City Council</option>
			<option>Central Goldfields Shire Council</option>
			<option>Colac Otway Shire Council</option>
			<option>Corangamite Shire Council</option>
			<option>Darebin City Council</option>
			<option>East Gippsland Shire Council</option>
			<option>Frankston City Council</option>
			<option>Gannawarra Shire Council</option>
			<option>Glen Eira City Council</option>
			<option>Glenelg Shire Council</option>
			<option>Golden Plains Shire Council</option>
			<option>Greater Bendigo City Council</option>
			<option>Greater Dandenong City Council</option>
			<option>Greater Geelong City Council</option>
			<option>Greater Shepparton City Council</option>
			<option>Hepburn Shire Council</option>
			<option>Hindmarsh Shire Council</option>
			<option>Hobsons Bay City Council</option>
			<option>Horsham Rural City Council</option>
			<option>Hume City Council</option>
			<option>Indigo Shire Council</option>
			<option>Kingston City Council</option>
			<option>Knox City Council</option>
			<option>Latrobe City Council</option>
			<option>Loddon Shire Council</option>
			<option>Macedon Ranges Shire Council</option>
			<option>Manningham City Council</option>
			<option>Mansfield Shire Council</option>
			<option>Maribyrnong City Council</option>
			<option>Maroondah City Council</option>
			<option>Melbourne City Council</option>
			<option>Melton City Council</option>
			<option>Mildura Rural City Council</option>
			<option>Mitchell Shire Council</option>
			<option>Moira Shire Council</option>
			<option>Monash City Council</option>
			<option>Moonee Valley City Council</option>
			<option>Moorabool Shire Council</option>
			<option>Moreland City Council</option>
			<option>Mornington Peninsula Shire Council</option>
			<option>Mount Alexander Shire Council</option>
			<option>Moyne Shire Council</option>
			<option>Murrindindi Shire Council</option>
			<option>Nillumbik Shire Council</option>
			<option>Northern Grampians Shire Council</option>
			<option>Port Phillip City Council</option>
			<option>Pyrenees Shire Council</option>
			<option>Queenscliffe Borough Council</option>
			<option>South Gippsland Shire Council</option>
			<option>Southern Grampians Shire Council</option>
			<option>Stonnington City Council</option>
			<option>Strathbogie Shire Council</option>
			<option>Surf Coast Shire Council</option>
			<option>Swan Hill Rural City Council</option>
			<option>Towong Shire Council</option>
			<option>Unincorporated Land (victoria)</option>
			<option>Wangaratta Rural City Council</option>
			<option>Warrnambool City Council</option>
			<option>Wellington Shire Council</option>
			<option>West Wimmera Shire Council</option>
			<option>Whitehorse City Council</option>
			<option>Whittlesea City Council</option>
			<option>Wodonga City Council</option>
			<option>Wyndham City Council</option>
			<option>Yarra City Council</option>
			<option>Yarra Ranges Shire Council</option>
			<option>Yarriambiack Shire Council</option>
			</select>
			<br>
			
			<div class="btn-group btn-group-justified">
				<div class="btn-group">
					<button type="button" onclick="location.href='index.php?link=main'" class="btn btn-default btn-sm">Home</button>
				</div>
				<div class="btn-group">
					<button type="submit" class="btn btn-default btn-sm">NEXT - Data Selection</button>
				</div>
			</div>
		</div>
		<form>

  </div>
 

</div>