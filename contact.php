<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "")
  {


    $secret = '6LcvlxgiAAAAAEJzBx_DG4Zd7laV_OXn6hGo0_dr';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {

  	$name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    $sql= "insert into contact (name,email,subject,message) value(:name,:email,:subject,:message)";
    $query=$dbh->prepare($sql);


$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);

$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Subscribed successfully!.');</script>";
echo "<script>window.location.href ='contact.html'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    } 

  
  }
  
}
else
    {
         echo '<script>alert("Please Verify the Captcha again!")</script>';
    } 

  ?>