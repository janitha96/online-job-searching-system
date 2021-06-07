<?php

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

?>
<?php 
session_start();
	
 if (isset($_POST['submit-login'])) {
 	

 	$uname=stripcslashes($uname);
 	$pwd=stripcslashes($pwd);
 	$uname= $_POST['uname'];
 	$pwd= $_POST['pwd'];

 	if (empty($uname) || empty($pwd)) {
 		header("Location: ../index.php?emptyFields");
 		exit();
 	}else{
 		$retrive="signupMembers/";
 		
			 	$data=  $database->getReference($retrive)->getValue();
						 	foreach ($data as $key => $row) {
			 		$i++;
			 	}	


 		if ($row['uname']!=$uname) {
 			header("Location: ../index.php?username=Wrong");
 			exit();
 		}else{
 				$dehashed=password_verify($pwd,$row['pwd']);

 				if ($dehashed == false) {
 					header("Location: ../index.php?password=error");
 					exit();
 				}elseif ($dehashed == true) {
 					//log in users
 					
 					$_SESSION['u_id']= $row['fname'];
 					
 					$_SESSION['u_name']= $row['uname'];
 					

 					

 					header("Location: ../index.php?login=Success");
 					exit();
 			}
 		}
 	}


 }else{
 	header("Location: ../index.php?login=error");
 	exit();
 }

 ?>