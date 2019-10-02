<?PHP 
 if( isset($_POST['txtNewLogin']) && isset($_POST['txtPassword']) ) { 
 $name = $_POST['txtname'];
 $familyname = $_POST['txtfamilyname'];
 $gender = $_POST['optgender'];
 //just pour le projet php get sinon c'est post
 $login = $_GET['txtLogin'];
 $newlogin = $_POST['txtNewLogin'];
 $password = $_POST['txtPassword'];
      
if($name == '' || $familyname == '' || $gender == ''|| $password == '' || $login == ''){
 echo 'please fill all values';
 }else{
    include_once("connection.php"); 
	include("md5encryptdecrypt.php");
 $sql = "SELECT * FROM compte WHERE login = '$login' ";
 
 $check = mysqli_fetch_array(mysqli_query($conn,$sql));
 
 if(isset($check)){
	$sql1 = "SELECT * FROM compte WHERE login = '$newlogin' and login <> '$login'";
	$check1 = mysqli_fetch_array(mysqli_query($conn,$sql1));
 
 if(isset($check1)){
 /*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
 {echo 'exist';exit;}*/
 echo 'exist';
 } 
 else{
 //$sql = "INSERT INTO compte (login,password,nom,prenom,gender) VALUES('$login','$password','$name','$familyname','$gender')";
 $sql2 = "UPDATE compte SET login = '$newlogin', password = '".crypter("123456789",$password)."', nom = '$name', prenom = '$familyname' , gender = '$gender' WHERE login='$login'";
 if(mysqli_query($conn,$sql2)){
 /*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'modified';exit;}*/
 echo 'modified';
 }else{
/*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
 {echo 'oops! Please try again!';exit;}*/
 echo 'oops! Please try again!';
 }
 }
 }else{
	 /*if(isset($_POST['mobile']) && $_POST['mobile'] == "android")
		{echo 'inexistant';exit;}*/
		 echo 'inexistant';
 }
 mysqli_close($conn);
 }
}
//retour
header("location:gestionUser.php");
?>

<!--html>

<head><title>modify account</title></head>
    <body>
	   <form action="</?PHP $_PHP_SELF ?>" method="post">
            Name        :  <input type="text" name="txtname" value="" /><br/>
            Family Name : <input type="text" name="txtfamilyname" value="" /><br/>
		    Gender      : <SELECT name="optgender" size="1">
			<OPTION>Male
			<OPTION>Female
			</SELECT><br/>
			Login       :  <input type="text" name="txtLogin" value="" /><br/>
			New Login       :  <input type="text" name="txtNewLogin" value="" /><br/>
            Password    : <input type="text" name="txtPassword" value="" /><br/>
            <input type="submit" name="btnSubmit" value="sing in"/>
        </form>
    </body>
</html-->
