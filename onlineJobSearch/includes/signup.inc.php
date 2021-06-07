
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

if (isset($_POST['submit-signup'])) {
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$conPwd=$_POST['conPwd'];

	 if (empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($pwd) || empty($conPwd)) {
			header("Location: ../signup.php?emptyFields=empty");
			exit();
		}else{
			if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) { // did not put space validation
				header("Location: ../signup.php?invalidNames=invalidName");
				exit();

			 }else{

			 	$retrive="signupMembers";
			 	$data=  $database->getReference($retrive)->getValue();
			 	foreach ($data as $key => $row) {
			 		$i++;
			 	}
				if ($row['email']==$email) {
						header("Location: ../signup.php?emailTaken=emailTaken");
						exit();
				}else{
					if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?invalidEmail=invalidemail");
					exit();

				}else{
					 if ($pwd!=$conPwd) {
							header("Location: ../signup.php?passwordsNotEquel=notEquel");
							exit();
						}else{
							//hashing password
						$hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
						  $insert=[
							    'fname'=> $fname,
							    'lname'=> $lname,
							    'email'=> $email,
							    'uname'=> $uname,
							    'pwd'=> $hashedpwd
							];

							$ref="signupMembers/";

							    $pushData = $database->getReference($ref)->push($insert);


							     $hostInsert=[
							    'uname'=> $uname
							];

							$hosting="host/";

							    $pushData = $database->getReference($hosting)->push($hostInsert);
   								 header("Location: ../login.php");

					}
				}
			}
		}
		}
}else{
	/// 
}

 ?>