<!-- PHP Code -->
	<?php 


	  $host = "localhost";
	  $user = "root";
	  $password = "";
	  $database = "projects_servers";

	  // include './db.php';
	  $connect = mysqli_connect($host, $user, $password, $database);

	  //structure query
	  $sql  = "SELECT *"; 
	  $sql .= " FROM logs";
	  // $sql .= " ORDER BY column DESC";

	  //run query
	  $result = mysqli_query($connect, $sql);
	  $response_num_rows = mysqli_num_rows($result);
	  // $row = mysqli_fetch_array($result);
	  

	  if ($result) {
	      // echo "Successful query";

	      if($response_num_rows > 0) { 
	      $data = ''; 
	      	//loop through the database content and echo them out
	      	while ($row = mysqli_fetch_assoc($result)) {
	      		// echo '<p>'.$row["column"].'</p>'; 

	      		$data .=  '
	      		<div class="col-lg-4">
	      			<div class="card" style="width: 18rem;">
					  
					  <div class="card-body">
					    <h5 class="card-title">Server Update</h5>
					    <p class="card-text"><b>Date :</b> '.$row["date_time"].'</p>
					  </div>
					  <ul class="list-group list-group-flush">
					    <p>
					    	<b>Update Output : </b> '.$row["upd"].'
					    </p>
					  </ul>
					  <ul class="list-group list-group-flush">
					    <p>
					    	<b>Update Output : </b> '.$row["upg"].'
					    </p>
					  </ul>
					  <!--div class="card-body">
					    <a href="#" class="card-link">Read more details</a>
					    <a href="#" class="card-link">View as Read</a>
					  </div-->
					</div>
				</div>
	      		';
	      	}
	      } else {
	      	$data .=  'No data';
	      }

	  }else {
	      echo mysqli_error($connect);
	  }
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Servers automation</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- CSS CDNs -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

	<!-- Custom stylesheet -->
	<link rel="stylesheet" href="style.css">

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body>
	<div class="container">	
		<div class="row">
			
				<?php 
					echo $data; 
				?>
			
			
		</div>
	</div>	
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>