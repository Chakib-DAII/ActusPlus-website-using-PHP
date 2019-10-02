<?php
session_start();
?>
<?PHP 
 if( isset($_GET['id']) && isset($_GET['content'])) {
 $id = $_GET['id'];
 $bannerurl = "http://192.168.137.1:8080/phpactusplus/files/".$_FILES["banner-url"]["name"];
 $uppertitle = $_POST['upper_title'];
 $title = $_POST['title'];
 $headerurl = "http://192.168.137.1:8080/phpactusplus/files/".$_FILES["header_url"]["name"];
 $date = $_POST['date'];
 $imageurl = "http://192.168.137.1:8080/phpactusplus/files/".$_FILES["image_url"]["name"];
 $ressourceurl = "http://192.168.137.1:8080/phpactusplus/files/".$_FILES["ressource_url"]["name"];
 $content = $_GET['content'];

foreach ($_FILES as $key => $value)
	{echo $value["name"].$_FILES["banner-url"]["name"];
	if ($value["error"] > 0){
                echo "<SCRIPT>alert('Sorry, there has been an error while uploading Please Try Again');</SCRIPT>";
                //echo "Return Code: ".$value["error"]."<br>";
                    //redirect to the main upload page
                  //  die('reciever.php');
                    //header("Location:uploader.php");


             
        }else{
               //echo "Upload: ".$_FILES["file"]["name"]."<br>";
               echo "<SCRIPT>alert('File Uploaded Successfully !');</SCRIPT>";
               
            }
	   
		//Image Extention Check
        if( $value["type"]=='jpg' || 'gif' || 'tif' || 'bmp'/* || 'doc' || 'docx' ||'xls'||'xlsx'*/){//only images
					//echo "Type: ".$_FILES["file"]["type"]."<br>";
					}else{
						
							echo"Error, Extentions other than pictures or documents is prohibited"."<br>";
					}
					//Check File Size
					
					if($value["size"] / 1048576 > 50){   //Larger than 50 MB is prohibited 
					 // echo"File size IS LARGER than 5 MB \r\n Return Code:".($_FILES["file"]["error"])."<br>"; 
				
				}else{
					 //echo "Size:".($_FILES["file"]["size"] / 1048576)." MB <br>";
					  }       

						//echo "Temp file:". $_FILES["file"]["tmp_name"]."<br>";
				
				
					 //Check if File's already been uploaded

					if (file_exists("C:/xampp\htdocs/actusplus/files/".($value["name"]))){    
						//echo $_FILES["file"]["name"] . " already exists.";

				 // If it's not uploaded , then :s
					}else{    
					
				  //Then Save it !
				move_uploaded_file($value["tmp_name"],"C:/xampp\htdocs/actusplus/files/".$value["name"]);
				//echo "Stored in: "."upload/" . $value["name"]."<br>";
				}
		}
	
/*if($name == '' || $familyname == '' || $gender == ''|| $password == '' || $login == ''){
 echo 'please fill all values';
 //retour
 header("location:javascript://history.go(-1)");
 }else{*/
    include_once("connection.php");
 $sql = "SELECT * FROM actus WHERE id = '$id' ";
 
 $check = mysqli_fetch_array(mysqli_query($conn,$sql));
 if(isset($check)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'exist';exit;}
	//banner-url = '$bannerurl', problem au niveau de nom 
	$sql = "UPDATE actus 
			SET id = '$id',upper_title = '$uppertitle',title = '$title',header_url = '$headerurl' ,date = '$date' ,image_url = '$imageurl',ressource_url = '$ressourceurl',content = '$content'
			where id = '$id'";
	mysqli_query($conn,$sql);
 echo 'exist';
 //retour
 //header("location:javascript://history.go(-1)");
 }else{ 
 $sql = "INSERT INTO actus
		VALUES('$id','$bannerurl','$uppertitle','$title','$headerurl','$date','$imageurl','$ressourceurl','$content')";
 if(mysqli_query($conn,$sql)){
 //if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'registered';exit;}
 echo 'registered';
 //ouverture page 
 //header("location:javascript://history.go(-1)");
 }else{
//if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){echo 'oops! Please try again!';exit;}
 echo 'oops! Please try again!'.mysqli_error($conn);
 //retour
 //header("location:javascript://history.go(-1)");
 }
 }
 mysqli_close($conn);
}else echo "hi hhhhhhhh"; 
 //retour
 //header("location:javascript://history.go(-1)");
header("location:gestionArticles.php");
?>