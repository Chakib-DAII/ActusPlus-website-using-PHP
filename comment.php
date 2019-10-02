<?PHP 
 if( isset($_GET['login']) && isset($_GET['id']) ) { 
 $login = $_GET['login'];
 $id = $_GET['id'];
 $comment=$_POST['comment'];
      
if($id == '' || $login == ''){
 echo 'please fill all values';
 }else{
    include_once("connection.php"); 
 $sql = "INSERT INTO comment (login,id_actus,comment) VALUES('$login','$id','$comment')";
 if(mysqli_query($conn,$sql)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'added';exit;}
 echo 'added';
 }else{
/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
 {echo 'oops! Please try again!';exit;}*/
 echo 'oops! Please try again!';
 }

 mysqli_close($conn);
 }
}
//retour
 header("location:detailPage.php?article=$id");
?>
