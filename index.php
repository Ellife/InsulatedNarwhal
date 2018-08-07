
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <title>Insulated Narwhal: Council Data</title>
      <meta http-equiv= "Content-Type" content="text/html;charset=iso-8859-1" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- <link rel="stylesheet" href="style.css" type="text/css"/> -->
   </head>
   <body>
      <div id="background"></div>
      <?php 
	  
	  if (!isset($council_name))
		{$council_name = "";
		$council_dataset= "";}
	  
      include("php/header.php");
      include("php/navigation.php");
      include("php/footer.php");
	  
	  
      if (empty($_GET)) {include("php/main.php");}
	  else {	
        $ref = trim($_GET["link"]);
		if ($ref === "main") {include("php/main.php");}		
		elseif ($ref === "council_select") {include("php/council_select.php");}
		elseif ($ref === "council_dataset") {include("php/council_dataset.php");}
		elseif ($ref === "council_result") {include("php/council_result.php");}
		elseif ($ref === "result_print") {include("php/result_print.php");}
		elseif ($ref === "data_types") {include("php/data_types.php");}
		elseif ($ref === "download") {include("php/download.php");} 
		elseif ($ref === "data_analysis") {include("php/data_analysis.php");}  
		elseif ($ref === "data_visual") {include("php/data_visual.php");}  
		elseif ($ref === "contact_us") {include("php/contact_us.php");}
	  }	   
      ?>
   </body>
</html>