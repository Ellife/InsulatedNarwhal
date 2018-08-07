<?php
  if (!empty($_POST["council_dataset"])) {
    $council_dataset= $_POST["council_dataset"];
	
    }
	

  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }

 function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
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
  <h2>Data Results</h2>
  <p>Council Selction and Data table Results</p>
    <div class="panel panel-default">
      <div class="panel-heading">Selected Council</div>
      <div class="panel-body"><?php echo $council_name;?></div>
      <div class="panel-heading">Selected Dataset</div>
      <div class="panel-body"><?php echo $council_dataset;?></div>
      <div class="panel-heading">Table Results</div>
      <div class="panel-body">
		<?php
		$conn = OpenCon();
		$result = mysqli_query($conn,"SELECT * FROM council WHERE councilname='$council_name'");
		$rowcount=mysqli_num_rows($result);

		if ($rowcount > 0) {
			echo "<table class='table table-bordered table-condensed'>";
			echo "<thead><tr><th>Council Name</th><th>PostCode</th><th>Surburb</th></tr></thead>";
			echo "<tbody>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["councilname"] . "</td><td>" . $row["postcode"] . "</td><td>" . $row["suburb"] . "</td></tr>";
			}	
			echo "</tbody>";
			echo "</table>";
		}
		CloseCon($conn);
		?>

	</div>
	</div>
</div>