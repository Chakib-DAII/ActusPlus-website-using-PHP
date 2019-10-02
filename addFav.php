<?PHP 
 if( isset($_GET['login']) && isset($_GET['id']) ) { 
 $login = $_GET['login'];
 $id = $_GET['id'];
      
if($id == '' || $login == ''){
 echo 'please fill all values';
 }else{
    include_once("connection.php"); 
 $sql = "SELECT * FROM favoris WHERE login = '$login' and id_actus = $id";
 
 $check = mysqli_fetch_array(mysqli_query($conn,$sql));
 
 if(isset($check)){
 /*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
 {echo 'exist';exit;}*/
 echo 'exist';
 }else{ 
 $sql = "INSERT INTO favoris (login,id_actus) VALUES('$login','$id')";
 if(mysqli_query($conn,$sql)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'added';exit;}
 echo 'added';
 }else{
/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
 {echo 'oops! Please try again!';exit;}*/
 echo 'oops! Please try again!';
 }
 }
 mysqli_close($conn);
 }
}
//retour
 header("location:detailPage.php?article=$id");
?>

<!--html>

<head><title>Signin</title></head>
    <body>
	   <form action="</?PHP $_PHP_SELF ?>" method="post">
			Login       :  <input type="text" name="txtLogin" value="" /><br/>
            id_actus    : <input type="text" name="id_actus" value="" /><br/>
            <input type="submit" name="btnSubmit" value="add"/>
        </form>
    </body>
</html-->

