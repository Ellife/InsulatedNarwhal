<?php
  if (!empty($_POST["council_dataset"])) {
    $council_dataset= $_POST["council_dataset"];
    }

  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
?>

<!-- <button type="button" a href="index.php?link=main" class="btn btn-default btn-sm">Home</button> -->


<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Council Selected</div>
			<div class="panel-body"><?php echo $council_name;?></div>
		<div class="panel-heading">Victorian Council Dataset</div>
			<div class="panel-body">
			<form method="post" action="index.php?link=council_result"> 
				<div class="container">
				<label class="radio">
					<input type="radio" name="council_dataset" value="median_house" checked>Median House Prices
				</label>
				<label class="radio">
					<input type="radio" name="council_dataset" value="vic_schools">Victorian Schools
				</label>
				<label class="radio">
					<input type="radio" name="council_dataset" value="vic_hospitals">Victorian Hospitals
				</label>
				</div>
				<input type="hidden" name="council_name" value="<?php echo $council_name;?>">
				<Br><br>
				
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
			</form>

			</div>
	</div>
</div>