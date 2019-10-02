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
        <li class="active" ><a href="gestionUser.php">User</a></li>
      </ul>
    </div>
  </div>
</nav>
</br></br></br>
<?php
if(isset ($_GET['id']))
{

if(isset($_SESSION["user"])) {
		
foreach ($_SESSION["user"] as $key => $value){
   if($value['login'] == $_GET['id'])
	{	
echo  "<div class=\"container\">
  <form class=\"form-horizontal\"  method=\"post\" action=\"modifyAccount.php?txtLogin=".$value['login']."\">
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtLogin\">Email:</label>
      <div class=\"col-sm-10\">
        <input type=\"email\" class=\"form-control\"  placeholder=\"Enter email\" name=\"txtNewLogin\" value=".$value['login']." required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtname\">FirstName:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter FirstName\" name=\"txtname\" value=".$value['prenom']." required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtfamilyname\">LastName:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\" placeholder=\"Enter LastName\" name=\"txtfamilyname\" value=".$value['nom']." required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\">Gender:</label>
      <div class=\"col-sm-10\">";
		if(strtolower($value['gender']) == "male")
		{
								echo	"<input type=\"radio\"  name=\"optgender\" value=\"male\" checked > 
										 <label for=\"Choice1\">male</label>
										 <input type=\"radio\"  name=\"optgender\" value=\"famale\">
										 <label for=\"Choice2\">female</label>";
		}
		else{
								echo	"<input type=\"radio\"  name=\"optgender\" value=\"male\" >
										 <label for=\"Choice1\">male</label>
										 <input type=\"radio\"  name=\"optgender\" value=\"famale\" checked  > 
										 <label for=\"Choice2\">female</label>";
			
		}
		
	  echo "</div>
    </div>
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtPassword\">Password:</label>
      <div class=\"col-sm-10\">          
        <input type=\"password\" class=\"form-control\"  placeholder=\"Enter password\" name=\"txtPassword\" value=".$value['password']." required > 
      </div>
    </div>
   
    <div class=\"form-group\">        
		<div class=\"Button\" align=\"center\">  
		  <button type=\"submit\" class=\"btn btn-default\" >Modifier</button>
		</div>
    </div>
  </form>
</div>";	
	}	
}
}
}
else
{
echo  "<div class=\"container\">
  <form class=\"form-horizontal\" method=\"post\" action=\"addUser.php\">
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtLogin\">Email:</label>
      <div class=\"col-sm-10\">
        <input type=\"email\" class=\"form-control\"  placeholder=\"Enter email\" name=\"txtLogin\" required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtname\">FirstName:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter FirstName\" name=\"txtname\" required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtfamilyname\">LastName:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\" placeholder=\"Enter LastName\" name=\"txtfamilyname\" required > 
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\">Gender:</label>
      <div class=\"col-sm-10\">
									<input type=\"radio\"  name=\"optgender\" value=\"male\">
										 <label for=\"Choice1\">male</label>
									<input type=\"radio\"  name=\"optgender\" value=\"famale\">
										 <label for=\"Choice2\">female</label>
      </div>
    </div>
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" for=\"txtPassword\">Password:</label>
      <div class=\"col-sm-10\">          
        <input type=\"password\" class=\"form-control\"  placeholder=\"Enter password\" name=\"txtPassword\" required > 
      </div>
    </div>
   
    <div class=\"form-group\">        
		<div class=\"Button\" align=\"center\">  
		  <button type=\"submit\" class=\"btn btn-default\" >Ajouter</button>
		</div>
    </div>
  </form>
</div>";		
}
?>


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
