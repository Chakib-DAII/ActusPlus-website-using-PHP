<?php
session_start();
?>
<html lang="en">
<head>
  <title>ActusPlus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
		/* Full-width input fields */
	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	/* Set a style for all buttons */
	.inputbutton {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	.inputbutton:hover {
		opacity: 0.8;
	}
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	button:hover {
		opacity: 0.8;
	}
	
	/* Extra styles for the cancel button */
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	/* Center the image and position the close button */
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}

	img.avatar {
		width: 40%;
		border-radius: 50%;
	}

	.containerr {
		padding: 16px;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px;
	}

	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid #888;
		width: 80%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button (x) */
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: red;
		cursor: pointer;
	}

	/* Add Zoom Animation */
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}

	@-webkit-keyframes animatezoom {
		from {-webkit-transform: scale(0)} 
		to {-webkit-transform: scale(1)}
	}
		
	@keyframes animatezoom {
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
		   display: block;
		   float: none;
		}
		.cancelbtn {
		   width: 100%;
		}
	}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="accueilLogged.php">Actus+</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="accueilLogged.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
		<li  class="active"><a href="#">Favorites</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


		<div class="container">
		  <h2>filtrer vos favoris</h2>
		  <!--form action="<\?PHP $_PHP_SELF ?>" method="post">
            Login :  <input type="text" name="txtLogin" value="" /><br/>
            <input type="submit" name="btnSubmit" value="get favs"/>
        </form--> 
		 
		  <input class="form-control" id="myInput" type="text" placeholder="Search..">
		  <br>
		  <ul class="list-group" id="myList" >
		  <?php 

		include_once("connection.php"); 
		
		/*if( isset($_POST['txtLogin'])) { 
        $login = $_POST['txtLogin'];*/
		$login=$_COOKIE["login"];
		$sql = "SELECT * FROM actus
				WHERE id in
					(SELECT id_actus FROM favoris
						WHERE login = '$login')";
			   

		$r = mysqli_query($conn,$sql);

		$result = array();
		if(mysqli_fetch_array($r)==NUll){
			echo "no favs";
		}
		else{
		while($row = mysqli_fetch_array($r)){
			//echo '<pre>'; print_r($row); echo '</pre>';
			array_push($result,array(
				'id'=>$row['id'],
				'banner-url'=>$row['banner-url'],
				'upper_title'=>$row['upper_title'],
				'title'=>$row['title'],
				'header_url'=>$row['header_url'],
				'date'=>$row['date'],
				'image_url'=>$row['image_url'],
				'ressource_url'=>$row['ressource_url'],
				'content'=>$row['content']
			));
		}
        //$_SESSION["actus"] =$result;

		foreach ($result as $key => $value){
					 echo"<li class=\"list-group-item\">
							  <div class=\"media\" >
							  <div class=\"media-left\">
							  <a href=\"detailPage.php?article=".$value['id']."\"><img src=".$value['image_url']." class=\"media-object\" style=\"width:200px\"></a>
							  </div>
							  <div class=\"media-body\">
							  </br>
							  <a href=\"detailPage.php?article=".$value['id']."\"><h4 class=\"media-heading\">".$value['title']."</h4></a>
							  <h4 ><small><i>Posted on ".$value['date']."</i></small></h4>
							  <h3 >".$value['upper_title']."</h3>
							  </div>
							  </div>
						  </li>";
					}
		/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
		echo json_encode(array('result'=>$result));
		exit;
		}
		echo json_encode(array('result'=>$result));*/
		}
		/*}*/
		$sql = "SELECT * FROM actus";

								$r = mysqli_query($conn,$sql);

								$result = array();

								while($row = mysqli_fetch_array($r)){
									array_push($result,array(
									   'id'=>$row['id'],
										'banner-url'=>$row['banner-url'],
										'upper_title'=>$row['upper_title'],
										'title'=>$row['title'],
										'header_url'=>$row['header_url'],
										'date'=>$row['date'],
										'image_url'=>$row['image_url'],
										'ressource_url'=>$row['ressource_url'],
										'content'=>$row['content']
									));
								}			
$_SESSION["actus"] =$result;	
		mysqli_close($conn);
		?>
		</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<footer class="container-fluid text-center">
  <p>Copyright &copy 2017    <a href="#" title="1stwebdesigner"> DAII-Chakib.com </a></p>
</footer>

</body>
</html>
