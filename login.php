<?php
include "header.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="loss">
</head>
<body>

<div class="reg">
    <div class="container">
     <form action="login2.php" method="post" class="form2" >
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="email" placeholder="User Name"><br>

     	<label>User Name</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
		 <h3> if you have not register <a href="register.php"> click here </a> </h3>
		
     </form>
     </div>
     </div>
</body>
</html>
<?php
include "footer.php";
?>
