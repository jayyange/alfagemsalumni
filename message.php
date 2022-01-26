<?php include('config.php') ?>
<?php
session_start();
// initializing variables
$FFname = "";
$MFname = "";
$LFname = "";
$email = "";
$pno   = "";
$address = "";
$yoc    = "";
$career = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'alfagems');

// APPLY
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $Fname = mysqli_real_escape_string($db, $_POST['Fname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
  $creationTime = mysqli_real_escape_string($db, $_POST['creationTime']);
 
  if (count($errors) == 0) {
  //	$password = md5($password_1); encrypt the password before saving in the database
 
  	$query = "INSERT INTO ujumbe (Fname, email, subject, message, creationTime) 
  			  VALUES('$Fname', '$email', '$subject', '$message', now())";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}

// ... 