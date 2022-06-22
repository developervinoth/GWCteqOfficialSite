<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];

    $sql= "insert into subscribers (email) value(:email)";
    $query=$dbh->prepare($sql);

$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Subscribed successfully!.');</script>";
echo "<script>window.location.href ='index.html'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    } 

  

  
}
  ?>