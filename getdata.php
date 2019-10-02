<?php 

include_once("connection.php"); 

$sql = "SELECT * FROM actus";

$r = mysqli_query($conn,$sql);

$result = array();

while($row = mysqli_fetch_array($r)){
	echo '<pre>'; print_r($row); echo '</pre>';
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
//if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
echo json_encode(array('result'=>$result));
//}
mysqli_close($conn);
?>
