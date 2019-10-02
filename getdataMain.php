<?php
session_start();
?>
<html lang="en">
<head>
  <title>Actus+ </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Filterable List</h2>
   <form action="<?PHP $_PHP_SELF ?>" method="post">
            offset:  <input type="integer" name="txtoffset" value="" /><br/>
            Limit: <input type="integer" name="txtlimit" value="" /><br/>
            <input type="submit" name="btnSubmit" value="Login"/>
        </form>
  <p>Type something in the input field to search the list for specific items:</p>  
  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <ul class="list-group" id="myList" >
  <?php 

include_once("connection.php"); 
if( isset($_POST['txtoffset']) && isset($_POST['txtlimit'])) { 
		$offset = $_POST['txtoffset'];
        $limit = $_POST['txtlimit'];
//$sql = "SELECT * FROM actus";
$sql = "SELECT * FROM actus LIMIT $offset, $limit";

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


foreach ($result as $key => $value){
			 echo"<li class=\"list-group-item\">
					  <div class=\"media\" >
					  <div class=\"media-left\">
					  <img src=".$value['image_url']." class=\"media-object\" style=\"width:200px\">
					  </div>
					  <div class=\"media-body\">
					  </br>
					  <h4 class=\"media-heading\">".$value['title']."</h4>
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

mysqli_close($conn);
?>

  </ul>  
  <ul class="pager">
    <li><a href="#">Previous</a></li>
	<ul class="pagination">
	  <li><a href="#">1</a></li>
	  <li><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li><a href="#">4</a></li>
	  <li><a href="#">5</a></li>
	</ul>
    <li><a href="#">Next</a></li>
  </ul>
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

</body>
</html>
