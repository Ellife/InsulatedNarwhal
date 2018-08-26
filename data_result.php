<?php
  if (!empty($_POST["council_dataset"])) {
    $council_dataset= $_POST["council_dataset"];
	
    }
	
if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
// House price db selection

if (!empty($_POST["house_db"])) {$house_db = $_POST["house_db"];}
else	{$house_db = "n";}


//house price db selection type ALL MAX MIN

if (!empty($_POST["minprice"])){$house_price=$_POST["minprice"];}

elseif (!empty($_POST["maxprice"])){$house_price=$_POST["maxprice"];}

else {$house_price = 0;}

if (!empty($_POST["value_type"])) {$value_type=$_POST["value_type"];}
else {$value_type="all";}

// Hosital count db selection

if (!empty($_POST["hospital_db"])){($hospital_db=$_POST["hospital_db"]);}
else{$hospital_db="n";}


if (!empty($_POST["public_count"])){($public_h_count=$_POST["public_count"]);}
else{$public_h_count="n";}

if (!empty($_POST["private_count"])){($private_h_count=$_POST["private_count"]);}
else{$private_h_count="n";}
	
// Schoiol db Selection

if (!empty($_POST["schools_db"])){($schools_db=$_POST["schools_db"]);}
else{$schools_db="n";}


if (!empty($_POST["public_count"])){($public_count=$_POST["public_count"]);}
else{$public_count="n";}

if (!empty($_POST["private_count"])){($private_count=$_POST["private_count"]);}
else{$private_count="n";}

if (!empty($_POST["primary_count"])){($primary_count=$_POST["primary_count"]);}
else{$primary_count="n";}

if (!empty($_POST["secondary_count"])){($secondary_count=$_POST["secondary_count"]);}
else{$secondary_count="n";}

if (!empty($_POST["special_count"])){($special_count=$_POST["special_count"]);}
else{$special_count="n";}


function OpenCon()
 {
 $dbhost = "mysql";
 $dbuser = "narwhal1";
 $dbpass = "insulated23";
 $db = "narwhal";
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 return $conn;
 }
function CloseCon($conn)
 {
 $conn -> close();
 }	
?>

<div class="container">
<h2>Data Results</h2>
<p>Council Selction and Data table Results</p>
<div class="panel panel-default">
<div class="panel-heading">Selected Council</div>

<div class="panel-body"><?php echo $council_name;?></div>

<div class="panel-heading">Selected Datasets and Filters</div>
<div class="panel-body">
<?php 


if ($house_db== "y"){
	echo "<div class='panel-body'>";
	echo "<h4>Median House Price database Selected</h4>";
	switch ($value_type){
		case "minprice":
			echo "<p>Minimum Price Filter: $".$house_price."</p>";
			break;
		case ("maxprice"):
			echo "<p>Maximum Price Filter: $".$house_price."</p>";
			break;
	default:
		echo "<p>All prices ranegs dispalyed</p>";
	}
	echo "</div>";
}

if ($hospital_db== "y"){
	echo "<div class='panel-body'>";
	echo "<h4>Hospital Databse Selected</h4>";
	if ($public_h_count=="y"){echo "<p>Public Hospital Count included</p>";}
	if ($private_h_count=="y"){echo "<p>Private Hospital Count included</p>";}
	echo "</div>";
}


if ($schools_db=="y"){
	echo "<div class='panel-body'>";
	echo "<h4>School Databse Selected</h4>";
	if ($public_count=="y"){echo "<p>Public School Count included {$public_count}</p>";}
	if ($private_count=="y"){echo "<p>Private School Count included</p>";}
	if ($primary_count=="y"){echo "<p>Primary School Count included</p>";}
	if ($secondary_count=="y"){echo "<p>Secondary School Count included</p>";}
	if ($special_count=="y"){echo "<p>Speical School Count included</p>";}
	echo "</div>";
}

?>



</div>
<div class="panel-heading">Table Results</div>
<div class="panel-body">
	<?php
	
		$conn = OpenCon();
		
		$result = mysqli_query($conn,("SELECT house_prices.suburb, house_prices.2017, house_prices.2018 FROM house_prices inner join council on house_prices.suburb=council.suburb where council.councilname ='$council_name' group by council.suburb"));
		
		
		$rowcount=mysqli_num_rows($result);
		
		if (($result)||(mysqli_errno == 0))
		{

		  if (mysqli_num_rows($result)>0){
				  //loop thru the field names to print the correct headers table-bordered table-condensed'
				echo "<table class='table table-bordered table-condensed table-striped'>\n";
				echo "<thead><tr>";
				
				$i = 0;
				while ($fieldinfo=mysqli_fetch_field($result)){
				echo "<th>{$fieldinfo->name}</th>";
					$i++;
					}
			echo "</tr></thead>";
			
			//display the data
			while ($row=mysqli_fetch_row($result)){
			  echo "<tr>";
			  foreach ($row as $data){
				echo "<td>{$data}</td>";
				}
			}
		  }else
			{echo "<tr><td>No Results found!</td></tr>";}
		
		  echo "</table>";
		  
		}else
			{echo "Error in running query :". mysqli_error();}
		
		CloseCon($conn);
	?>
</div>
</div>
</div>