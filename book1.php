<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "booking";
    
    // get values form input text and number

   
    $id = $_POST['id'];
    $email = $_POST['email'];
    $roomname = $_POST['roomname'];
    $roomno = $_POST['roomno'];
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

   
$query = " INSERT INTO `book`(`id`, `roomno`, `roomblock`, `roomffloor`, `roomname`, `status`) VALUES (null,'$id','$email','$roomname','$roomno','unbooked')";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result)
    {
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
    
    else{
        echo 'Data Not Inserted';
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
}

?>
