<?php
if(isset ($_GET['id']))
{ $login = $_GET['id'];
    include_once("connection.php"); 
 $sql = "DELETE FROM compte WHERE login = '$login' ";
 
		mysqli_query($conn,$sql);

}
//retour
header("location:gestionUser.php");
?>