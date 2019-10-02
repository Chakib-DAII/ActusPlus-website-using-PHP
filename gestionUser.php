<?php
session_start();
if( isset($_GET['min']) && isset($_GET['max'])) {
	if(!isset($_SESSION['min'])) {
		$_SESSION['min']=$_GET['min'];
	}
	if(!isset($_SESSION['max'])) {
		$_SESSION['max']=$_GET['max'];
	}
}else{
	if(!isset($_SESSION['min'])) {
		$_SESSION['min']="0";
	}
	if(!isset($_SESSION['max'])) {
		$_SESSION['max']="8";
	}	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ActusPlus</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="external/jquery.hotkeys.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="external/google-code-prettify/prettify.js"></script>
		<link href="index.css" rel="stylesheet">
    <script src="bootstrap-wysiwyg.js"></script>

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
      <a class="navbar-brand" href="#">Actus+</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="gestionArticles.php">Articles</a></li>
        <li class="active" ><a href="#">User</a></li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="accueilLogged.php">Espace Visiteur</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
	</br></br>
	<div class="Button" align="center">  
		<a href="gestionUserselected.php"><button type="button" class="btn ">Ajouter</button></a>
	</div>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
	 <table class="table table-bordered table-striped">
	<thead>
	  <tr>
	    <th>Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>Password</th>
		<th>action</th>
	  </tr>
	</thead>
		<tbody id="myTable">
    <?php 

include("connection.php"); 
//$sql = "SELECT * FROM actus";
$sql = "SELECT * FROM compte";

$r = mysqli_query($conn,$sql);

$result = array();

while($row = mysqli_fetch_array($r)){
	//echo '<pre>'; print_r($row); echo '</pre>';
    array_push($result,array(
        'login'=>$row['login'],
        'password'=>$row['password'],
        'nom'=>$row['nom'],
        'prenom'=>$row['prenom'],
		'gender'=>$row['gender']
    ));
}

$_SESSION["user"] =$result;
foreach ($result as $key => $value){
		//echo "<li class=\"list-group-item\">First item</li>";
				 echo  "<tr><td>".$value['prenom']."</td>
						<td>".$value['nom']."</td>
						<td>".$value['login']."</td>
						<td>".$value['password']."</td>
						<td>
							<div class=\"Button\" align=\"center\"> 						
								  <a href=\"gestionUserselected.php?id=".$value['login']."\"><button type=\"button\" class=\"btn btn-warning\">Modifier</button></a>
								  <a href=\"deleteUser.php?id=".$value['login']."\"><button  type=\"button\" class=\"btn btn-danger\">Supprimer</button></a>
							<div/>	  
						</td>
					    </tr>";
			}
/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
echo json_encode(array('result'=>$result));
exit;
}
echo json_encode(array('result'=>$result));*/


mysqli_close($conn);
?>
    </tbody>
  </table>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
