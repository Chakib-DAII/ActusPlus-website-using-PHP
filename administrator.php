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
  <title>Administrateur</title>
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
</head>
<body>

<div class="container">
  <h2>Administrateur</h2>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#articles">Articles</a></li>
    <li><a data-toggle="tab" href="#Users">Users</a></li>
  </ul>

  <div class="tab-content">
    <div id="articles" class="tab-pane fade in active">
			<div class="container">
			  <h2>Articles :</h2>
			  <input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
				 <table class="table table-bordered table-striped">
				<thead>
				  <tr>
					<th>upper_title</th>
					<th>title</th>
					<th>date</th>
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
									<td>".$value['upper_title']."</td>
									<td>".$value['title']."</td>
									<td>".$value['date']."</td>
									<td>					
									  <button type=\"button\" class=\"btn btn-warning\">Modifier</button>
									  <button type=\"button\" class=\"btn btn-danger\">Supprimer</button>
									</td>
									</tr>";
						}
			/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
			echo json_encode(array('result'=>$result));
			exit;
			}
			echo json_encode(array('result'=>$result));*/

					echo "</ul>  
					  <ul class=\"pager\">
						<li><a href=\"administrator.php?min=".(($_SESSION['min']-8 >=0)? ($_SESSION['min']-8):0)."&max="
						.(($_SESSION['max']-8 >=8)? ($_SESSION['max']-8):8)."\">Previous</a></li>
						
						<li><a href=\"administrator.php?min=".(($_SESSION['min']+8 <= $rowcount-8)? ($_SESSION['min']+8):($rowcount-8))."&max="
						.(($_SESSION['max']+8 <= $rowcount)? ($_SESSION['max']+8):$rowcount)."\">Next</a></li>
					  </ul>
					</div>";
			mysqli_close($conn);
			?>
				</tbody>
			  </table>
			</div>
			 <div class="container">
			  <h2>Modify</h2>
			  <form class="form-horizontal" action="/action_page.php">
				<div class="form-group">
				  <label class="control-label col-sm-2" >banner-url:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  placeholder="Enter banner-url" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >upper_title:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  placeholder="Enter upper_title">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >title:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  placeholder="Enter title" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >header_url:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  placeholder="Enter header_url" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >date:</label>
				  <div class="col-sm-10">          
					<input type="date" class="form-control"  placeholder="Enter date" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >image_url:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control"  placeholder="Enter image_url" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >ressource_url:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control"  placeholder="Enter ressource_url" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" >Content:</label>
				  <div class="col-sm-10">          
						
				  </div>
				</div>
					   
					<div class="container">
					  <div >
						<div id="alerts"></div>
						<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
						  <div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  </ul>
							</div>
						  <div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
							  <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
							  <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
							<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
							<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
							<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
							<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
							<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
							<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
							<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
							<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
							<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
						  </div>
						  
						  <div class="btn-group">
							<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
							<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
						  </div>
						  <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
						</div>

						<div id="editor">
						</div>
					  </div> 
					 </div>

				<br>
					<div class="Button" align="center">  
					  <button type="submit" class="btn btn-default" >Submit</button>
					</div>
			  </form>
			</div>


    </div>
    <div id="Users" class="tab-pane fade">
		
<div class="container">
  <h2>Utilisateurs du site :</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
	 <table class="table table-bordered table-striped">
	<thead>
	  <tr>
	    <th>Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>select</th>
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


foreach ($result as $key => $value){
		//echo "<li class=\"list-group-item\">First item</li>";
				 echo  "<tr><td>".$value['prenom']."</td>
						<td>".$value['nom']."</td>
						<td>".$value['login']."</td>
						<td>
	  <button type=\"button\" class=\"btn btn-warning\">Modifier</button>
	  <button type=\"button\" class=\"btn btn-danger\">Supprimer</button>
	  
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
 <div class="container">
  <h2>Modify</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">FirstName:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter FirstName" name="email">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">LastName:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter LastName" name="email">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Gender:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter Gender" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>


    </div>
  </div>
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
