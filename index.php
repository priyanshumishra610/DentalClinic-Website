<?php

date_default_timezone_set('Asia/Kolkata');

$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   if(!preg_match('/^[6-9]\d{9}$/', $number)){
      $message[] = 'Please enter a valid 10-digit Indian mobile number.';
   }else{
      $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

      if($insert){
         $message[] = 'Appointment booked successfully! We will contact you shortly.';
      }else{
         $message[] = 'Appointment booking failed. Please try again or call us.';
      }
   }

}

?>
