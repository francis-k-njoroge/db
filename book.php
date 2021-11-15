<?php
include "header.php";
?>



<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']) ) {

 ?>

<div class="reg">
<div class="container">
    <div class="form">
    
     <h1>welcome <?php echo $_SESSION['fname']; ?></h1>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolorem maxime architecto dolor nobis tempora ab. Alias ad eum soluta, animi vel ipsam officia voluptatem repellendus qui tempora, quisquam dolor.</p>

     

     <a href="logout.php">Logout</a> 
     </div>
     <div class="form">

     <table>
        <h1>rooms available </h1>
<tr>
<th>room id</th>
<th>room no</th>
<th>room block</th>
<th>room floor</th>
<th>room name</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "booking");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `room` WHERE `status`='unbooked';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["roomno"] . "</td><td>"
. $row["roomblock"]. "</td> <td>"
. $row["roomffloor"]. "</td> <td>"
. $row["roomname"]. "</td>  </tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    
     </div>

     <div class="form">
     <h1>input room no</h1>
        <form action="" method="get">
        <input type="text" name="roomno" value="<?php if(isset($_GET['roomno'])){echo $_GET['roomno'];} ?>"> 
       <input type="submit" value="search" name="search">
 </form>
 <?php 
                                     $con = mysqli_connect("localhost","root","","booking");

                                    if(isset($_GET['roomno']))
                                    {
                                        $id = $_GET['roomno'];

                                        $query = " SELECT * FROM `room` WHERE roomno='$id' AND `status`='unbooked';";
                                       
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <form action="book1.php" method="post">
                                                    email
                                                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" > your id
                                                    <input type="text" name="id" value="<?php echo $_SESSION['id']; ?>" >
                                                    roomblock

                                                <input type="text" name="roomblock" value="<?= $row['roomblock']; ?>">
                                                room name
                                                <input type="text" name="roomname" value="<?= $row['roomname']; ?>">
                                                room number
                                                <input type="text" name="roomno" value="<?= $row['roomno']; ?>">
                                                <input type="submit" name="insert" value="book" >

                                                </form>
                                               
                                               
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

     </div>


     </div>
     
    
     
     </div>
</body>
</html>

<?php 
}else{
     header("Location: home.php");
     exit();
}
 ?>

<?php
include "footer.php";
?>
