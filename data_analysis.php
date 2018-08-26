<?php
  if (!empty($_POST["council_name"])) {
    $council_name = $_POST["council_name"];
    }
?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><h3>Council Selection</h3></div>
    <div class="panel-body">
		<form method="post" action="index.php?link=data_types">  
		<?php include("council_list.php"); ?>
		<form>

  </div>
 

</div>