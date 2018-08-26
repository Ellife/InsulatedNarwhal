
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
 $dbhost = "localhost";
 $dbuser = "narwhal1";
 $dbpass = "insulated23";
 $db = "council_data";
 
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
<h2>Data Results and Charts</h2>
<div class="panel panel-default">
<div class="panel-heading"><h3>Selected Council</h3></div>

<div class="panel-body"><?php echo $council_name;?></div>

<div class="panel-heading"><h3>Selected Datasets and Filters</h3></div>
<div class="panel-body">


<?php 
// declare query type from postcode
	
	$query_type = "";
if (!empty($_POST["advanced_query"])){
	
	$query_type ="advanced";
	$data_set="";
	
	// set variables to no value;
	$join_school = "";
	$join_hospital= "";
	$join_house ="";
	
	$school_data="";
	$hospital_data = "";
	$house_data="";
	
	$select_stm = "select council.suburb";
	$extra_data =",council.property_count, council.elector_count";
	$from_stm = " FROM council";
	$where_stm=" WHERE council.councilname ='".$council_name."'";
	$group_stm =" GROUP BY council.suburb";

	
	if ($house_db== "y"){
		echo "<div class='panel-body'>";
		echo "<h4>Median House Price database Selected</h4>";
		$data_set.="Meddian House Prices ";
		$join_house =" join house_prices on house_prices.suburb=council.suburb";
		switch ($value_type){
			case "minprice":
				echo "<p>Minimum Price Filter: $".$house_price."</p>";
				$house_data=",house_prices.2017>=$house_price ,house_prices.2016>=$house_price,house_prices.2015>=$house_price";
				break;
			case ("maxprice"):
				echo "<p>Maximum Price Filter: $".$house_price."</p>";
				$house_data=",house_prices.2017<=$house_price,house_prices.2016<=$house_price as 2016 ,house_prices.2015<=$house_price";
				break;
		default:
			echo "<p>All prices ranegs dispalyed</p>";
			$house_data=",house_prices.2017,house_prices.2016,house_prices.2015 ";
		}
		echo "</div>";
	}

	if ($hospital_db== "y"){
		
		echo "<div class='panel-body'>";
		echo "<h4>Hospital Databse Selected</h4>";
		$hospital_data.=",count(hospitals.FID) AS Total_hospitals";
		$join_hospital = " left JOIN hospitals on hospitals.postcode=council.postcode";
		$data_set.="Hospital Countil type ";
		if ($public_h_count=="y"){echo "<p>Public Hospital Count included</p>";
			$hospital_data.=",count(hospitals.type='PUBLIC') AS public_hospitals";}
		if ($private_h_count=="y"){echo "<p>Private Hospital Count included</p>";
			$hospital_data.=",count(hospitals.type='PRIVATE') AS Private_hospitals";}
		echo "</div>";
	}


	if ($schools_db=="y"){
		echo "<div class='panel-body'>";
		echo "<h4>School Databse Selected</h4>";
		$school_data.= ",count(schools.school_id) as total_schools";
		$join_school.= " left join schools on schools.postcode=council.postcode";
		$data_set.="School Type count ";
		if ($public_count=="y"){echo "<p>Public School Count included {$public_count}</p>";
								$school_data.=",COUNT(schools.type='Public') as private_schools";}
		if ($private_count=="y"){echo "<p>Private School Count included</p>";
								$school_data.=",COUNT(schools.type='Pri/Sec') as private_schools";}
		if ($primary_count=="y"){echo "<p>Primary School Count included</p>";
								$school_data.=",COUNT(schools.type='Primary') as primary_schools";}
		if ($secondary_count=="y"){echo "<p>Secondary School Count included</p>";
									$school_data.=",COUNT(schools.type='Secondary') as secondary_schools";}
		if ($special_count=="y"){echo "<p>Speical School Count included</p>";
								$school_data.=",COUNT(schools.type='Special') as secondary_schools";}
		echo "</div>";
	}
	
	$db_query = $select_stm;
	$db_query.= $house_data;
	$db_query.= $school_data;
	$db_query.=$hospital_data;
	//$db_query.= $extra_data;
	$db_query.=$from_stm;
	$db_query.=$join_house;
	$db_query.=$join_school;
	$db_query.=$join_hospital;
	$db_query.=$where_stm ;
	$db_query.=$group_stm;
	
	
}


if (!empty($_POST["basic_query"])) {
	
	$query_type ="basic";
	
	if ($council_dataset=="m"){
		echo "<div class='panel-body'>";
		echo "<h4>Median House Price Database Selected</h4>";
		
		echo "</div>";
		$data_set = "Victorian Median House Price Data";
		$db_query = "SELECT house_prices.suburb, house_prices.2015, house_prices.2016, house_prices.2017,house_prices.2018
					FROM house_prices 
					LEFT JOIN council on house_prices.suburb=council.suburb 
					where council.councilname LIKE '$council_name%'
					group by council.suburb";

	}elseif ($council_dataset=="h") {
		echo "<div class='panel-body'>";
		echo "<h4>Victorian Hospital Database Selected</h4>";
		echo "</div>";
		$data_set = "Victorian Hospital Data";
		$db_query ="select council.suburb, count(DISTINCTROW hospitals.FID) AS Total_hospitals, count(DISTINCTROW hospitals.type='PUBLIC') AS public_hospitals, count(DISTINCTROW hospitals.type='PRIVATE') AS Private_hospitals from council 
		left JOIN hospitals on hospitals.postcode=council.postcode
		where council.councilname LIKE '$council_name%'
		group by council.suburb";
	}elseif ($council_dataset=="s"){
		echo "<div class='panel-body'>";
		echo "<h4>Victorian School Database Selected</h4>";
		echo "</div>";	
		$data_set = "Victorian School Data";
		$db_query ="select council.suburb,count(DISTINCTROW schools.school_id) as total_schools, sum(schools.type='Primary') as primary_schools, sum(schools.type='Secondary') as secondary_schools,sum(schools.type='Pri/Sec') as private_schools, sum(schools.type='Special') as special_schools
		from council
		left join schools on schools.postcode=council.postcode
		where council.councilname LIKE '$council_name%'
		group by council.suburb";
	}
}
?>


</div>
<div class="panel-heading"><h3>Table Results</h3></div>
<div class="panel-body">
	<?php
		
		$conn = OpenCon();
		
		$result = mysqli_query($conn,($db_query));
		$result2 =$conn->query($db_query);
		
		
		
		if (($result)||(mysqli_errno == 0))
		{

		  if (mysqli_num_rows($result)>0){
				  //loop thru the field names to print the correct headers table-bordered table-condensed'
				echo "<table class='table' id='table_data' table-bordered table-condensed table-striped'>\n";
				echo "<thead><tr>";
				
				$i = 0;
				
				$table_data = [[]];
				$table_head=[[]];
				
				
				while ($fieldinfo=mysqli_fetch_field($result)){
					echo "<th>{$fieldinfo->name}</th>";
					$table_head[0][$i]=$fieldinfo->name;
					//$table_data[0][$i]=$fieldinfo->name;
					$i++;
					}
				echo "</tr></thead>";
			
			//display the data
				$i=0;
				while ($row=mysqli_fetch_row($result)){
				  echo "<tr>";
				  $x=0;
				  foreach ($row as $data){
					echo "<td>{$data}</td>";
					if ($data=='NA'){
						$table_data[$i][$x]=intval(0);}
					else{$table_data[$i][$x]=$data;}
					$x++;
					}
					$i++;
			}
		  }else
			{echo "<tr><td>No Results found!</td></tr>";}
			
		
		  echo "</table>";
		  
		}else
			{echo "Error in running query :". mysqli_error();}
		

		
		$table_data=json_encode($table_data);
		$table_head=json_encode($table_head);
		$council_name =json_encode($council_name);
		$data_set =json_encode($data_set);
		CloseCon($conn);
	?>
</div>
<div class="panel-heading"><h3>Graph of Result</h3></div>
<div class="panel-body">
	<?php 
	if ($query_type== "basic"){include("bar_chart.php");}
	if ($query_type== "advanced"){include("bubble_chart.php");}?>

</div>
</div>
</div>