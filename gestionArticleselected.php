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
	#editor {
	max-height: 250px;
	height: 250px;
	background-color: white;
	border-collapse: separate; 
	border: 1px solid rgb(204, 204, 204); 
	padding: 4px; 
	box-sizing: content-box; 
	-webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
	box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
	border-top-right-radius: 3px; border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px; border-top-left-radius: 3px;
	overflow: scroll;
	outline: none;
}
#voiceBtn {
  width: 20px;
  color: transparent;
  background-color: transparent;
  transform: scale(2.0, 2.0);
  -webkit-transform: scale(2.0, 2.0);
  -moz-transform: scale(2.0, 2.0);
  border: transparent;
  cursor: pointer;
  box-shadow: none;
  -webkit-box-shadow: none;
}

div[data-role="editor-toolbar"] {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.dropdown-menu a {
  cursor: pointer;
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
        <li class="active"><a href="gestionArticles.php">Articles</a></li>
        <li><a href="gestionUser.php">User</a></li>
      </ul>
    </div>
  </div>
</nav>
</br></br></br>
 <?php 
if(isset ($_GET['id']))
{
if(isset($_SESSION["actus"])) {
		
foreach ($_SESSION["actus"] as $key => $value){
   if($value['id'] == $_GET['id'])
	{
echo "<div class=\"container\">
  <form class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\" action=\"addArticle.php?id=".$value['id']."&content=".$value['content']."\"> 
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >banner-url:</label>
      <div class=\"col-sm-10\">
		<input  id=\"file\" name=\"banner-url\" type=\"file\" required />		
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >upper_title:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter upper_title\" name=\"upper_title\" value=".$value['upper_title']." required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >title:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter title\" name=\"title\" value=".$value['title']." required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >header_url:</label>
      <div class=\"col-sm-10\">
		<input  id=\"file\" name=\"header_url\" type=\"file\" required />	
      </div>
    </div>
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >date:</label>
      <div class=\"col-sm-10\">          
        <input type=\"date\" class=\"form-control\"  placeholder=\"Enter date\" name=\"date\" value=".$value['date']." required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >image_url:</label>
      <div class=\"col-sm-10\">          
		<input  id=\"file\" name=\"image_url\" type=\"file\" required />
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >ressource_url:</label>
      <div class=\"col-sm-10\">          
		<input  id=\"file\" name=\"ressource_url\" type=\"file\" required />
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >Content:</label>
      <div class=\"col-sm-10\">          
			
      </div>
    </div>
		   
		<div class=\"container\">
		  <div >
			<div id=\"alerts\"></div>
			<div class=\"btn-toolbar\" data-role=\"editor-toolbar\" data-target=\"#editor\">
			  <div class=\"btn-group\">
				<a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" title=\"Font\"><i class=\"icon-font\"></i><b class=\"caret\"></b></a>
				  <ul class=\"dropdown-menu\">
				  </ul>
				</div>
			  <div class=\"btn-group\">
				<a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" title=\"Font Size\"><i class=\"icon-text-height\"></i>&nbsp;<b class=\"caret\"></b></a>
				  <ul class=\"dropdown-menu\">
				  <li><a data-edit=\"fontSize 5\"><font size=\"5\">Huge</font></a></li>
				  <li><a data-edit=\"fontSize 3\"><font size=\"3\">Normal</font></a></li>
				  <li><a data-edit=\"fontSize 1\"><font size=\"1\">Small</font></a></li>
				  </ul>
			  </div>
			 
			 <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"bold\" title=\"Bold (Ctrl/Cmd+B)\"><i class=\"icon-bold\"></i></a>
				<a class=\"btn\" data-edit=\"italic\" title=\"Italic (Ctrl/Cmd+I)\"><i class=\"icon-italic\"></i></a>
				<a class=\"btn\" data-edit=\"strikethrough\" title=\"Strikethrough\"><i class=\"icon-strikethrough\"></i></a>
				<a class=\"btn\" data-edit=\"underline\" title=\"Underline (Ctrl/Cmd+U)\"><i class=\"icon-underline\"></i></a>
			  </div>
			  
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"insertunorderedlist\" title=\"Bullet list\"><i class=\"icon-list-ul\"></i></a>
				<a class=\"btn\" data-edit=\"insertorderedlist\" title=\"Number list\"><i class=\"icon-list-ol\"></i></a>
				<a class=\"btn\" data-edit=\"outdent\" title=\"Reduce indent (Shift+Tab)\"><i class=\"icon-indent-left\"></i></a>
				<a class=\"btn\" data-edit=\"indent\" title=\"Indent (Tab)\"><i class=\"icon-indent-right\"></i></a>
			  </div>
			  
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"justifyleft\" title=\"Align Left (Ctrl/Cmd+L)\"><i class=\"icon-align-left\"></i></a>
				<a class=\"btn\" data-edit=\"justifycenter\" title=\"Center (Ctrl/Cmd+E)\"><i class=\"icon-align-center\"></i></a>
				<a class=\"btn\" data-edit=\"justifyright\" title=\"Align Right (Ctrl/Cmd+R)\"><i class=\"icon-align-right\"></i></a>
				<a class=\"btn\" data-edit=\"justifyfull\" title=\"Justify (Ctrl/Cmd+J)\"><i class=\"icon-align-justify\"></i></a>
			  </div>
			  
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"undo\" title=\"Undo (Ctrl/Cmd+Z)\"><i class=\"icon-undo\"></i></a>
				<a class=\"btn\" data-edit=\"redo\" title=\"Redo (Ctrl/Cmd+Y)\"><i class=\"icon-repeat\"></i></a>
			  </div>
			  <input type=\"text\" data-edit=\"inserttext\" id=\"voiceBtn\" x-webkit-speech=\"\" >
			</div>

			<div id=\"editor\" name=\"content\" required >
						".$value['content']."
			</div>
		  </div> 
		 </div>

	<br>
		<div class=\"Button\" align=\"center\">  
		  <button type=\"submit\"  id=\"submit_button\" class=\"btn btn-default\" >Submit</button>
		</div>
  </form>
</div>"; 	
}	
}
}
}
else
{if(isset($_SESSION["actus"])) {
	$i =0;	
foreach ($_SESSION["actus"] as $key => $value){
   if($i == 0)
	{$i++;
	//count 
		include_once("connection.php");
		$sql1 = "SELECT * FROM actus ";
		$r1 = mysqli_query($conn,$sql1);
		$rowcount=mysqli_num_rows($r1);
echo "<div class=\"container\">
  <form class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\"  action=\"addArticle.php?id=".($rowcount+1)."&content=".$value['content']."\"> 
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >banner-url:</label>
      <div class=\"col-sm-10\">
			<input  id=\"file\" name=\"banner-url\" type=\"file\" required />
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >upper_title:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter upper_title\" name=\"upper_title\" required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >title:</label>
      <div class=\"col-sm-10\">
        <input type=\"text\" class=\"form-control\"  placeholder=\"Enter title\" name=\"title\" required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >header_url:</label>
      <div class=\"col-sm-10\">
		<input  id=\"file\" name=\"header_url\" type=\"file\"  required/>
	</div>
    </div>
    <div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >date:</label>
      <div class=\"col-sm-10\">          
        <input type=\"date\" class=\"form-control\"  placeholder=\"Enter date\" name=\"date\" required >
      </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >image_url:</label>
      <div class=\"col-sm-10\">          
			<input  id=\"file\" name=\"image_url\" type=\"file\"  required/>
	  </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >ressource_url:</label>
      <div class=\"col-sm-10\">          
      			<input  id=\"file\" name=\"ressource_url\" type=\"file\"  required/>
	  </div>
    </div>
	<div class=\"form-group\">
      <label class=\"control-label col-sm-2\" >Content:</label>
      <div class=\"col-sm-10\">          
			
      </div>
    </div>
		   
		<div class=\"container\">
		  <div >
			<div id=\"alerts\"></div>
			<div class=\"btn-toolbar\" data-role=\"editor-toolbar\" data-target=\"#editor\">
			  <div class=\"btn-group\">
				<a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" title=\"Font\"><i class=\"icon-font\"></i><b class=\"caret\"></b></a>
				  <ul class=\"dropdown-menu\">
				  </ul>
				</div>
			  <div class=\"btn-group\">
				<a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" title=\"Font Size\"><i class=\"icon-text-height\"></i>&nbsp;<b class=\"caret\"></b></a>
				  <ul class=\"dropdown-menu\">
				  <li><a data-edit=\"fontSize 5\"><font size=\"5\">Huge</font></a></li>
				  <li><a data-edit=\"fontSize 3\"><font size=\"3\">Normal</font></a></li>
				  <li><a data-edit=\"fontSize 1\"><font size=\"1\">Small</font></a></li>
				  </ul>
			  </div>
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"bold\" title=\"Bold (Ctrl/Cmd+B)\"><i class=\"icon-bold\"></i></a>
				<a class=\"btn\" data-edit=\"italic\" title=\"Italic (Ctrl/Cmd+I)\"><i class=\"icon-italic\"></i></a>
				<a class=\"btn\" data-edit=\"strikethrough\" title=\"Strikethrough\"><i class=\"icon-strikethrough\"></i></a>
				<a class=\"btn\" data-edit=\"underline\" title=\"Underline (Ctrl/Cmd+U)\"><i class=\"icon-underline\"></i></a>
			  </div>
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"insertunorderedlist\" title=\"Bullet list\"><i class=\"icon-list-ul\"></i></a>
				<a class=\"btn\" data-edit=\"insertorderedlist\" title=\"Number list\"><i class=\"icon-list-ol\"></i></a>
				<a class=\"btn\" data-edit=\"outdent\" title=\"Reduce indent (Shift+Tab)\"><i class=\"icon-indent-left\"></i></a>
				<a class=\"btn\" data-edit=\"indent\" title=\"Indent (Tab)\"><i class=\"icon-indent-right\"></i></a>
			  </div>
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"justifyleft\" title=\"Align Left (Ctrl/Cmd+L)\"><i class=\"icon-align-left\"></i></a>
				<a class=\"btn\" data-edit=\"justifycenter\" title=\"Center (Ctrl/Cmd+E)\"><i class=\"icon-align-center\"></i></a>
				<a class=\"btn\" data-edit=\"justifyright\" title=\"Align Right (Ctrl/Cmd+R)\"><i class=\"icon-align-right\"></i></a>
				<a class=\"btn\" data-edit=\"justifyfull\" title=\"Justify (Ctrl/Cmd+J)\"><i class=\"icon-align-justify\"></i></a>
			  </div>
			  
			  <div class=\"btn-group\">
				<a class=\"btn\" data-edit=\"undo\" title=\"Undo (Ctrl/Cmd+Z)\"><i class=\"icon-undo\"></i></a>
				<a class=\"btn\" data-edit=\"redo\" title=\"Redo (Ctrl/Cmd+Y)\"><i class=\"icon-repeat\"></i></a>
			  </div>
			  <input type=\"text\" data-edit=\"inserttext\" id=\"voiceBtn\" x-webkit-speech=\"\"  >
			</div>

			<div id=\"editor\" name=\"content\" required >
			</div>
		  </div> 
		 </div>

	<br>
		<div class=\"Button\" align=\"center\">  
		  <button type=\"submit\"  id=\"submit_button\" class=\"btn btn-default\" >Submit</button>
		</div>
  </form>
</div>"; 	
}	
}
}
}
?>

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
<script>

$("document").ready(function(){
$(".form-horizontal").submit(function(){
     $.ajax({
         type: 'POST',
         url: 'addArticle.php',
         data: { content: $('#editor').val()}
     });
  });
});

</script>
</body>
</html>
