<?php
session_start();
?>
<?PHP 
    include_once("connection.php");
	include("md5encryptdecrypt.php");
    if( isset($_POST['txtLogin']) && isset($_POST['txtPassword']) ) { 		

				setcookie("login",$_POST['txtLogin'],time()+86400 * 30);
				setcookie("password",$_POST['txtPassword'],time()+86400 * 30);
				
		$login = $_POST['txtLogin'];
        $password = $_POST['txtPassword'];	
		//echo $login."<br>".$password."<br>".crypter("123456789",$password);
        $query = "SELECT * FROM compte WHERE login = '$login' and password = '".crypter("123456789",$password)."';"; 
        
        $result = mysqli_query($conn, $query);
		
		if(mysqli_fetch_array($result)==NUll){ 
            /*if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){ 
				echo "success"; 
                exit; 
            }*/
			echo "Login Failed";
			header("location:javascript://history.go(-1)");
			exit;			
            //header("http://192.168.137.1:80/phpmyadmin/index.php");
        } else{ 
         //echo "success";
			header("location:accueilLogged.php");
			exit;
        } 
    } 
?>


<!--html>

<head><title>Login</title></head>
    <body>
	   <form action="<\?PHP $_PHP_SELF ?>" method="post">
            Login :  <input type="text" name="txtLogin" value="" /><br/>
            Password : <input type="password" name="txtPassword" value="" /><br/>
            <input type="submit" name="btnSubmit" value="Login"/>
        </form>
    </body>
</html-->