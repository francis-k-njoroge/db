<?php
if (isset($_POST['submit'])) {
    if ( isset($_POST['roomno'])&& isset($_POST['roomblock']) &&
        isset($_POST['roomfloor']) && isset($_POST['roomname'])) {
        
        $roomno = $_POST['roomno'];
        $roomblock = $_POST['roomblock'];
        $roomfloor = $_POST['roomfloor'];
        $roomname = $_POST['roomname'];
       

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "booking";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT roomno FROM room WHERE roomno = ? LIMIT 1";
            $Insert = "INSERT INTO `room` (`id`, `roomno`, `roomblock`, `roomffloor`, `roomname`) VALUES (NULL, ?, ?, ?,?);";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $roomno);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("isss",$roomno, $roomblock ,$roomfloor, $roomname);
                if ($stmt->execute()) {
                    header("Location: admin.php");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "room alredy exist.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>