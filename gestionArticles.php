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
		$_SESSION['max']="5";
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
        <li class="active"><a href="#">Articles</a></li>
        <li><a href="gestionUser.php">User</a></li>
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
		<a href="gestionArticleselected.php"><button type="button" class="btn ">Ajouter</button></a>
	</div>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
				 <table class="table table-bordered table-striped">
				<thead>
				  <tr>
					<th>id</th>
					<th>titre de l'article</th>
					<th>title</th>
					<th>date d'ajout</th>
					<th>action</th>
				  </tr>
				</thead>
					<tbody id="myTable">
				<?php 

			include("connection.php"); 
			if( isset($_GET['min']) && isset($_GET['max'])) {
			 $_SESSION['min'] = $_GET['min'];
			 $_SESSION['max'] = $_GET['max'];
		}
			$offset = $_SESSION['min'];
			$limit = $_SESSION['max'];
		$sql = "SELECT * FROM actus LIMIT $offset, $limit";
		//count 
		$sql1 = "SELECT * FROM actus ";
		$r1 = mysqli_query($conn,$sql1);
		$rowcount=mysqli_num_rows($r1);
		

			$r = mysqli_query($conn,$sql);

			$result = array();

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
			
			$_SESSION["actus"] =$result;
			foreach ($result as $key => $value){
					//echo "<li class=\"list-group-item\">First item</li>";
							 echo  "<tr>
									<td>".$value['id']."</td>
									<td>".$value['upper_title']."</td>
									<td>".$value['title']."</td>
									<td>".$value['date']."</td>
									<td>
									<div class=\"Button\" align=\"center\">  
										<a href=\"gestionArticleselected.php?id=".$value['id']."\"><button type=\"button\" class=\"btn btn-warning\">Modifier</button></a>
										<a href=\"deleteArticle.php?id=".$value['id']."\"><button type=\"button\" class=\"btn btn-danger\">Supprimer</button></a>
									</div>									
									</td>
									</tr>
									";
						}
			/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
			echo json_encode(array('result'=>$result));
			exit;
			}
			echo json_encode(array('result'=>$result));*/

					echo "</table>
   							</ul>  
							  <ul class=\"pager\">
								<li><a href=\"gestionArticles.php?min=".(($_SESSION['min']-5 >=0)? ($_SESSION['min']-5):0)."&max="
								.(($_SESSION['max']-5 >=5)? ($_SESSION['max']-5):5)."\">Previous</a></li>
								
								<li><a href=\"gestionArticles.php?min=".(($_SESSION['min']+5 <= $rowcount-5)? ($_SESSION['min']+5):($rowcount-5))."&max="
								.(($_SESSION['max']+5 <= $rowcount)? ($_SESSION['max']+5):$rowcount)."\">Next</a></li>
							</ul>
					</div>";
			mysqli_close($conn);
			?>
				</tbody>
</div>

		<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37452180-6', 'github.io');
  ga('send', 'pageview');
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 </script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
