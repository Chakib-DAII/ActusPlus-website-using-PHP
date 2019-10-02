<?php
session_start();
?>
<?PHP 
 if( isset($_POST['txtLogin']) && isset($_POST['txtPassword']) ) { 
 $name = $_POST['txtname'];
 $familyname = $_POST['txtfamilyname'];
 $gender = $_POST['optgender'];
 $login = $_POST['txtLogin'];
 $password = $_POST['txtPassword'];
   
if($name == '' || $familyname == '' || $gender == ''|| $password == '' || $login == ''){
 echo 'please fill all values';
 }else{
    include_once("connection.php");
	include("md5encryptdecrypt.php");
 $sql = "SELECT * FROM compte WHERE login = '$login' ";
 
 $check = mysqli_fetch_array(mysqli_query($conn,$sql));
 
 if(isset($check)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'exist';exit;}
 echo 'exist';
 }else{ 
 $sql = "INSERT INTO compte (login,password,nom,prenom,gender) VALUES('$login','".crypter("123456789",$password)."','$name','$familyname','$gender')";
 if(mysqli_query($conn,$sql)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'registered';exit;}
 //echo 'registered';
 }else{
//if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'oops! Please try again!';exit;}
 echo 'oops! Please try again!';
}
 }
 mysqli_close($conn);
 }
}else echo "hi hhhhhhhh"; 
 //retour
header("location:gestionUser.php");
?>

<!--html>

<head><title>Signin</title></head>
    <body>
	   <form action="<\?PHP $_PHP_SELF ?>" method="post">
            Name        :  <input type="text" name="txtname" value="" /><br/>
            Family Name : <input type="text" name="txtfamilyname" value="" /><br/>
		    Gender      : <SELECT name="optgender" size="1">
			<OPTION>Male
			<OPTION>Female
			</SELECT><br/>
			Login       :  <input type="text" name="txtLogin" value="" /><br/>
            Password    : <input type="password" name="txtPassword" value="" /><br/>
            <input type="submit" name="btnSubmit" value="sing in"/>
        </form>
    </body>
</html-->

