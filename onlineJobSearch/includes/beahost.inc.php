<?php


?>
<?php 

// distance validation does not apply yet
       session_start();

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/jd16948-firebase-adminsdk-6h9t5-595d9c2afe.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://jd16948.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();
if (isset($_SESSION['u_name'])) 
{
	$uname=$_SESSION['u_name'];
    if (isset($_POST['submit-next'])) 
    {

		$cname=$_POST['cname'];
		$email=$_POST['email'];
		$add=$_POST['add'];
		$conNum1=$_POST['conNum1'];
		$conNum2=$_POST['conNum2'];
		$conNum3=$_POST['conNum3'];
		$conNum4=$_POST['conNum4'];
		$over=$_POST['over'];
		$ref=$_POST['ref'];
	

	$image1Name=$_FILES['image1']['name'];
	$image1Type=$_FILES['image1']['type'];
	$image1Size=$_FILES['image1']['size'];
	$image1Error=$_FILES['image1']['error'];
	$image1TmpName=$_FILES['image1']['tmp_name'];

	 $image1Ext=explode('.', $image1Name);
	 $image1ActualExt=strtolower(end($image1Ext));
	 $image1allowed=array('jpg','jpeg','png');

	 if (empty($cname) || empty($email) || empty($add) || empty($conNum1) || empty($conNum2)) {
			header("Location: ../insert.php?empty=emptyFields");
			exit();
		}else{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					header("Location: ../insert.php?invalidEmail=invalid");
			 		exit();
				}else{
					if (!preg_match("/^[0-9]*$/", $conNum1) || !preg_match("/^[0-9]*$/", $conNum2) || !preg_match("/^[0-9]*$/", $conNum3) || !preg_match("/^[0-9]*$/", $conNum4) ) {
						header("Location: ../insert.php?enterNumbers=numbersOnly");
			 			exit();
					}else{
							if (in_array($image1ActualExt, $image1allowed)) {
							 	if ($image1Error===0)  {
							 		if (!$image1Size<200000) {
							 			$image1NewName=uniqid('', true).".".$image1ActualExt;
							 			$image1Destination="img/".$image1NewName;
							 			move_uploaded_file($image1TmpName, $image1Destination);    	
							 			/////////
							 			 $update=[
							    'cname'=> $cname,
							    'email'=> $email,
							    'add'=> $add,
							    'conNum1'=> $conNum1,
							    'conNum2'=> $conNum2,
							    'conNum3'=> $conNum3,
							    'conNum4'=> $conNum4,
							    'over'=> $over
							];

							

							    $pushData = $database->getReference($ref)->update($update);
   								 header("Location:login.php");

							 		}else{
							 			header("Location: ../insert.php?imageSize=error");
										exit();
							 			
							 		}
							 	}else{
							 		header("Location: ../insert.php?image=error");
										exit();
							 		
							 	}
							 }else{
							 	header("Location: ../insert.php?imageType=error");
										exit();
	 	
						 }	
			        }
		      }

    
  }
}

}
       

    

?>
