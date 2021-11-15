<?php
include "header.php"
?>

<div class="reg">
<div class="container">
    <div class="form">
        <h1>register a room</h1>
    <form action="rooms.php" method="POST">
    <input type="text" name="roomno" placeholder="roomnumber">
    <input type="text" name="roomblock" placeholder="room blocks">
    <input type="text" name="roomfloor" placeholder="room floor">
    <input type="text" name="roomname" placeholder="room name">
    <input type="submit" name="submit">

  
       </form>
    </div>

    <div class="form">
   
    <table>
        <h1>registered customers</h1>
<tr>
<th>Id</th>
<th>firstname</th>
<th>lastname</th>
<th>email</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "booking");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `id`, `fname`, `lname`, `email` FROM `user`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"] . "</td><td>"
. $row["lname"]. "</td> <td>"
. $row["email"]. "</td>  </tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    
    </div>

    <div class="form">

    <table>
        <h1>rooms</h1>
<tr>
<th>room id</th>
<th>room no</th>
<th>room block</th>
<th>room floor</th>
<th>room name</th>
<th>status</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "booking");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `room`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["roomno"] . "</td><td>"
. $row["roomblock"]. "</td> <td>"
. $row["roomffloor"]. "</td> <td>"
. $row["roomname"]. "</td>   <td>"
. $row["status"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    
    
   
    </div>

    <div class="form">
    <table>
        <h1>rooms  booked </h1>
<tr>
<th>book id</th>
<th>user id</th>
<th> user email</th>
<th>room name</th>
<th>room number </th>
<th> time</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "booking");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `book`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["bookid"]. "</td><td>" . $row["id"] . "</td><td>"
. $row["email"]. "</td> <td>"
. $row["roomname"]. "</td> <td>"
. $row["roomno"]. "</td> <td>"
. $row["booktime"]. "</td> </tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    
   
    </div>
    
    </div>
    </div>


<?php
include "footer.php"
?>