<?php
if(isset ($_GET['id']))
{ $id = $_GET['id'];
    include_once("connection.php"); 
 $sql = "DELETE FROM actus WHERE id = '$id' ";
 
		mysqli_query($conn,$sql);

}
//retour
header("location:gestionArticles.php");
?>