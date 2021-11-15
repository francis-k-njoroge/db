<?php
if (isset($_POST['submit'])) {
    if ( isset($_POST['fname'])&& isset($_POST['lname']) &&
        isset($_POST['email']) && isset($_POST['password'])) {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
       

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "booking";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM user WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`) VALUES (NULL, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss",$fname, $lname ,$email, $password);
                if ($stmt->execute()) {
                    header("Location: login.php");
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
                header("Location:home.php?error=Someone already registers using this email.");
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