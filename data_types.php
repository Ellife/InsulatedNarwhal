<?php
  if (!empty($_POST["council_dataset"])) {
    $council_dataset= $_POST["council_dataset"];
    }

  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
	
?>



<script>

function reset_form() {
    document.getElementById("data_select").reset();
}
</script>

<div class="container" onload"">
	<div class="panel panel-default">  
		<div class="panel-heading">Victorian Council Data Set Selection and Filter</div>
		<div class="panel-body">
			<h4>Selected Council: <?php echo $council_name;?></h4>
			<p>Choose the Data sets to incldue<p>
		</div>
	</div>
<div class="panel-group">
<form name="data_select"  action="index.php?link=council_result" method="post"> 

<input type="hidden" name="council_name" value="<?php echo $council_name;?>">
<input type="hidden" name="advanced_query" value ="y">
<div class="panel panel-default">  
	<div class="panel-heading">
		<h3>Victoria Median House Price per Suburb</h3>
		<p>Select to Include Median House Prices and Price Threshold</p>
	</div>
	<div class="form-check">
		<div class="panel-body" id="house_prices">
			<label class="form-check-label" for="house_db">
				<input type="checkbox" class="form-check-input" id="house_db" name="house_db" value="y" data-toggle="collapse" data-target="#opt1"> Median House Prices
			</label>
		</div>
		<div class="panel-body">
			<div id="opt1" class="collapse">
				<label class="radio-inline"><input type="radio" name="value_type" value="all" checked onclick="setBoth()">All House Prices</label>
				<label class="radio-inline"><input type="radio" name="value_type" value="minprice" onclick="setMin()">Minimum House Price</label> 
				<input type="number" id="minprice" name="minprice" min="100000" value="100000" step ="10000" disabled>
				<label class="radio-inline"><input type="radio" name="value_type" value="maxprice" onclick="setMax()">Maximum ouse Price</label>
				<input type="number" id="maxprice" name="maxprice" min="500000" value="500000" step ="10000" disabled>
			</div>
		</div>
	</div>
</div>

<script>
function setMin () {
    document.getElementById("minprice").disabled = false;
	document.getElementById("maxprice").disabled = true;
}

function setMax() {
    document.getElementById("minprice").disabled = true;
	document.getElementById("maxprice").disabled = false;
}

function setBoth() {
    document.getElementById("minprice").disabled = true;
	document.getElementById("maxprice").disabled = true;
}

</script>

 <div class="panel panel-default">  
	<div class="panel-heading">
		<h3>Victorian Hospital Data Selection</h3>
		<p>Hospital Count per Suburb by type<p>
	</div>
	<div class="form-check">
		<div class="panel-body">
			<label class="form-check-label" for="hospital_db">
				<input type="checkbox" class="form-check-input" id="hospital_db" name="hospital_db" value="y" data-toggle="collapse" data-target="#opt2"> Victorian Hostpitals
			</label>
		</div>
		<div class="panel-body">
			<div id="opt2" class="collapse">
				<label class="checkbox-inline">
				  <input type="checkbox" name="all_count" value="all" checked disabled>Total Hospital Count
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="public_count" value="y">Public Hospital Count
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="private_count" value="y">Private Hospital Count
				</label>
			
			</div>
		</div>
	</div>
</div>

 <div class="panel panel-default"> 
	<div class="panel-heading">
		<h3>Victorian School Type Per Suburb</h3>
		<p>Check to Include filter</p>
	</div>
	<div class="form-check">
		<div class="panel-body">
			<label class="form-check-label" for="schoolds_db">
				<input type="checkbox" class="form-check-input" id="schools_db" name="schools_db"	value="y" data-toggle="collapse" data-target="#opt3"> Victorian Schools
			</label>
			<div class="panel-body">
				<div id="opt3" class="collapse">
				<label class="checkbox-inline">
				  <input type="checkbox" name="all_school_count" value="all" checked disabled>Total School Count
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="public_count" value="y">Public School
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="private_count" value="y">Private School
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="primary_count" value="y">Primary School
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="secondary_count" value="y">Secondary School
				</label>
				<label class="checkbox-inline">
				  <input type="checkbox" name="special_count" value="y">Special School
				</label>
				</div>
			</div>
		</div>
	</div>
 </div>
 
<div class="panel panel-default">  
	<div class="btn-group btn-group-justified">
		<div class="btn-group">
			<button type="button" onclick="location.href='index.php?link=main'" class="btn btn-default btn-sm">Home</button>
		</div>
		<div class="btn-group">
			<button type="button" onclick="location.href='index.php?link=council_select'" class="btn btn-default btn-sm">Back - Council selection</button>
		</div>
		<div class="btn-group">
			<button type="submit" class="btn btn-default btn-sm">NEXT - Selection Results</button>
		</div>
	</div>
</div>
</form>
</div>
</div>