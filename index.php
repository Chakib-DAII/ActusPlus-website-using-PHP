<?php
session_start();
if(isset($_COOKIE["login"]) ) {	 
	global $login;
	$login=$_COOKIE["login"];
}
if(isset($_COOKIE["password"]) ) {	 
	global $pass;
	$pass=$_COOKIE["password"];
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
      <a class="navbar-brand" href="#">Actus+</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li onclick="document.getElementById('id01').style.display='block'"><a href="#">Gallery</a></li>
		<li onclick="document.getElementById('id01').style.display='block'"><a href="#">Favorites</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li onclick="document.getElementById('id01').style.display='block'"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div>
<br>
  <div class="container">
					 <div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
						  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						  <li data-target="#myCarousel" data-slide-to="1"></li>
						  <li data-target="#myCarousel" data-slide-to="2"></li>
						  <li data-target="#myCarousel" data-slide-to="3"></li>
						  <li data-target="#myCarousel" data-slide-to="4"></li>
						  <li data-target="#myCarousel" data-slide-to="5"></li>
						  <li data-target="#myCarousel" data-slide-to="6"></li>
						  <li data-target="#myCarousel" data-slide-to="7"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
								<?php 
								
								include_once("connection.php"); 
								$sql = "SELECT * FROM actus ORDER BY ID DESC LIMIT 8";

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
								 $active=true;

								foreach ($result as $key => $value){
												if($active == true)
												{
												echo  "<div class=\"item active\">
														  <img src=".$value['image_url']." alt=".$value['title']." style=\"width:100%;\">
														  </div>";
													$active = false;	  
												}else {
													echo  "<div class=\"item\">
														  <img src=".$value['image_url']." alt=".$value['title']." style=\"width:100%;\">
														  </div>";
												}			  
											}
												

								?>
									  

						
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						  <span class="glyphicon glyphicon-chevron-left"></span>
						  <span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						  <span class="glyphicon glyphicon-chevron-right"></span>
						  <span class="sr-only">Next</span>
						</a>
					  </div>
					</div>
					<br><br>
					</div>
						  <div id="id01" class="modal">
						  
						  <form class="modal-content animate" method="post" action="/phpactusplus/login.php">
							<div class="imgcontainer">
							  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
							  <img src="" alt="Login" class="avatar" width="20px">
							</div>

							<div class="containerr">
							  <label><b>Username</b></label>
							  <input  type="text" placeholder="Enter Username" name="txtLogin" value="<?php echo $login;?>" required >

							  <label><b>Password</b></label>
							  <input  type="password" placeholder="Enter Password" name="txtPassword" value="<?php echo $pass;?>"required>
								
							  <input class="inputbutton" type="submit" name="btnSubmit" value="Login"/>
							  <input type="checkbox" checked="checked"> Remember me
							</div>
	
							<div class="containerr" style="background-color:#f1f1f1">
							  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
							  <span class="psw">don't have an account ?<li onclick="document.getElementById('id01').style.display='none';document.getElementById('id02').style.display='block'"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Create one?</a></li></span>
							</div>
						  </form>
						</div>
						
						<div id="id02" class="modal">
						  
						  <form class="modal-content animate" method="post" action="/phpactusplus/signin.php">
							<div class="imgcontainer">
							  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
							  <img src="" alt="Signin" class="avatar" width="20px">
							</div>

							<div class="containerr">
							  <label><b>FirstName</b></label>
							  <input type="text" placeholder="Enter Username" name="txtname" required >
							  <label><b>LastName</b></label>
							  <input type="text" placeholder="Enter Username" name="txtfamilyname" required >
							  <label><b>Gender</b></label><br><br>
									<input type="radio" id="Choice1" name="optgender" value="male">
										 <label for="Choice1">male</label>
									<input type="radio" id="Choice2" name="optgender" value="famale">
										 <label for="Choice2">female</label>
									<br><br>
    						  <label><b>Email</b></label>
							  <input type="text" placeholder="Enter Username" name="txtLogin" required >
							  <label><b>Password</b></label>
							  <input type="text" placeholder="Enter Password" name="txtPassword" required>
							  
							    <input class="inputbutton" type="submit" name="btnSubmit" value="Signin"/>
							  <input type="checkbox" checked="checked"> Remember me
							</div>
							
							<div class="containerr" style="background-color:#f1f1f1">
							  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
							</div>
						  </form>
						</div>

<div class="container-fluid bg-3 text-center">    

 
<div class="row">
 <?php 
 $i = 0;
foreach ($result as $key => $value){
				 echo  "<div class=\"col-sm-3\">
							  <p>".$value['title']."</p>
							  <img onclick=\"document.getElementById('id01').style.display='block'\" src=\"".$value['image_url']."\" class=\"img-responsive\" style=\"width:100%\" alt=\"Image\">
						</div>";
					$i++;
					if($i == 4) echo"</div><div class=\"row\">"; 	
			}
mysqli_close($conn);
?>
</div>
</div><br>


<footer class="container-fluid text-center">
  <p>Copyright &copy 2017   <a href="#" title="1stwebdesigner"> DAII-Chakib.com </a></p>
</footer>
<script>
// Get the modal
var modal = document.getElementById('id01');
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
