
<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "booking";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   
   $roomno = $_POST['roomno'];
  
           
   // mysql query to Update data
   $query = " UPDATE `room` SET`status`='booked' WHERE `id`=$roomno;";
  
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
    header("Location: home.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}

?>