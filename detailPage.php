<?php
session_start();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	
	/*social media*/
		.fa {
		  padding: 20px;
		  font-size: 30px;
		  width: 150px;
		  text-align: center;
		  text-decoration: none;
		  margin: 5px 2px;
		}

		.fa:hover {
			opacity: 0.7;
		}

		.fa-facebook {
		  background: #3B5998;
		  color: white;
		}

		.fa-twitter {
		  background: #55ACEE;
		  color: white;
		}

		.fa-google-plus {
		  background: #dd4b39;
		  color: white;
		}

		.fa-linkedin {
		  background: #007bb5;
		  color: white;
		}

		.fa-pinterest {
		  background: #cb2027;
		  color: white;
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
        <li><a href="accueilLogged.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
		<li><a href="favoris.php">Favorites</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php 

include_once("connection.php"); 

if(isset($_SESSION["actus"])) {
		
foreach ($_SESSION["actus"] as $key => $value){
   if($value['id'] == $_GET['article'])
	{
			echo  "<div>
			<br>
				<div class=\"container\">
					 <img src=".$value['image_url']." alt=\"Los Angeles\" style=\"width:100%;\">
				</div>
			<br><br>
			</div>
			<div class=\"container-fluid bg-3 text-center\">    
			   <div class=\"row content\">
			 <div class=\"col-sm-8 text-left\"> 
				  <h1>".$value['upper_title']."</h1>
				  <h2>".$value['title']."</h2>
					<br><br> 
					<video width=\"100%\" controls>
					  <source src=".$value['ressource_url']." type=\"video/mp4\">
					  <source src=".$value['ressource_url']." type=\"video/ogg\">
					  Your browser does not support HTML5 video.
					</video>
					<br><br>
				  <p>".$value['content']."</p>
				  <hr>";
				  $id= $value['id'];
				  $login= $_COOKIE["login"];
				  $sql = "SELECT * FROM favoris WHERE login = '$login' and id_actus = $id";
 
				$check = mysqli_fetch_array(mysqli_query($conn,$sql));
 
				if(isset($check)){
							echo "<a class=\"btn icon-btn btn-warning\" href=\"deleteFav.php?id=".$id."&login=".$login."\">
							<span class=\"glyphicon btn-glyphicon glyphicon-minus img-circle text-warning\"></span>
							Unlike
							</a>";
					}else
						{	echo"<a class=\"btn icon-btn btn-primary\" href=\"addFav.php?id=".$id."&login=".$login."\">
							<span class=\"glyphicon btn-glyphicon glyphicon-thumbs-up img-circle text-primary\"></span>
							Like
							</a>";}
						
					$sql = "SELECT * FROM comment co , compte c
							WHERE c.login = '$login' and co.id_actus='$id'";
						   

					$r = mysqli_query($conn,$sql);

					$result = array();
					while($row = mysqli_fetch_array($r)){
						//echo '<pre>'; print_r($row); echo '</pre>';
						array_push($result,array(
							'login'=>$row['login'],
							'id_actus'=>$row['id_actus'],
							'comment'=>$row['comment'],
							'nom'=>$row['nom'],
							'prenom'=>$row['prenom']
						));
					}
					
						echo "	
								<br><br>		 <form class=\"form-horizontal\" method=\"post\" action=\" comment.php?id=".$id."&login=".$login."\">
											<div class=\"input-group\">
											   <input type=\"text\"  placeholder=\"Ajouter un commentaire\" class=\"form-control\" name=\"comment\"  required>
											   <span class=\"input-group-btn\">
													<button type=\"submit\" class=\"btn btn-default\" type=\"button\">Commenter</button>
											   </span>
											</div>
										</form>";
					foreach ($result as $key => $value){
					echo "<div class=\"media\">
							<div class=\"media-left\">
								<img src=\"userrr.png\" class=\"media-object\" style=\"width:60px\">
							</div>
							<div class=\"media-body\">
								<h4 class=\"media-heading\">".$value['prenom']." ".$value['nom']."</h4>
									<p>".$value['comment']."</p>
							</div>
					</div>
					";
					}
					
						echo "
				</div>
				<div class=\"col-sm-2 sidenav\">";
		}
	}
}	
/*echo "<br><div >
								<br><br>
								<h4>share on :</h4>
								<span class=\"share-links\">

								<a href=\"\" class=\"fa fa-twitter\" title=\"Tweet It\">
									<span class=\"visuallyhidden\">Twitter</span></a>
									
								<a href=\"\" class=\"fa fa-facebook\" title=\"Share on Facebook\">
									<span class=\"visuallyhidden\">Facebook</span></a>
									
								<a href=\"\" class=\"fa fa-google-plus\" title=\"Share on Google+\">
									<span class=\"visuallyhidden\">Google+</span></a>
									
								<a href=\"\" class=\"fa fa-pinterest\" title=\"Share on Pinterest\">
									<span class=\"visuallyhidden\">Pinterest</span></a>
									
								<a href=\"\" class=\"fa fa-linkedin\" title=\"Share on LinkedIn\">
									<span class=\"visuallyhidden\">LinkedIn</span></a>

								
								</span>
							</div>";*/	
//$_SESSION["actus"] =$result;			
$sql = "SELECT * FROM actus ORDER BY ID DESC LIMIT 6";

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

		foreach ($result as $key => $value){
						 echo "<div>
							  <a href=\"detailPage.php?article=".$value['id']."\"><h5>".$value['title']."</h5></a>
							  <a href=\"detailPage.php?article=".$value['id']."\"><img src=".$value['image_url']." class=\"img-responsive\" style=\"width:100%\" alt=\"Image\"></a>
							</div>
							<br>";
			}
					
			echo  "	</div>
			  </div> 
			  </div><br>";


//set sesssion
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




<footer class="container-fluid text-center">
  <p>Copyright &copy 2017    <a href="#" title="1stwebdesigner"> DAII-Chakib.com </a></p>
</footer>
</body>
</html>
