<?php
session_start();
?>

<!DOCTYPE html> <!--Dashboard code-->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin-panel</title>
  <link rel="stylesheet" href="style.css" /> <!-- Calling external css program-->
</head>
<body>
  <div class="container"> <!--Navigation Bar--> 
    <nav>
      <h2 style="padding-left:20px">Welcome </h2>
      <h3 style="padding-left:20px"> <?php echo $_SESSION['Username']; ?>!</h3> <!--Display username-->
        <br>
      <ul>
        <li><a href="login.php">Home</a></li><!-- Displaying Navigation Options-->

        <li><a href="orders.php">Orders</a></li>

        <li><a href="products.php">Products</a></li>

        <li><a href="customers.php">Customers</a></li>

        <li><a href="login.php">Settings</a></li>

        <li><a href="login.php">Help</a></li>

        <li><a href="logout.php" class="logout"> <!--Calling "logout.php" program-->
          <span>Log out</span>
        </a></li>

      </ul>
    </nav>
  </div>
</body>
</html>
