<?php
session_start();
?>

<!DOCTYPE html> <!--Dashboard code-->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin-panel</title>
  <link rel="stylesheet" href="style.css" /> <!-- Calling external CSS program -->
</head>
<body>
  <div class="container"> <!-- Navigation Bar --> 
    <nav>
        <h2 style="padding-left:20px">Welcome </h2>
        <h3 style="padding-left:20px"> <?php echo $_SESSION['Username']; ?>!</h3> <!--Display username-->
            <br>
    <ul>
        <li><a href="login.php"> <!-- Displaying Navigation Options -->
          Home
        </a></li>

        <li><a href="orders.php">Orders</a></li>

        <li><a href="products.php">Products</a></li>

        <li><a href="customers.php">Customers</a></li>

        <li><a href="login.php">Settings</a></li>

        <li><a href="login.php">Help</a></li>

        <li><a href="logout.php" class="logout"> <!-- Calling "logout.php" program -->
          <span>Log out</span>
        </a></li>

    </ul>
    </nav>

    <!-- Main content starts below -->
    <section class="main">
      <section class="main-box">
        <h1>Products</h1>
        <div class="table">
          <table>
            <thead>
              <tr>
                <th>Product ID</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              // Database connection parameters:
              $host = 'localhost';
              $database = 'db_login';
              $username = 'root';
              $password = '';

              // Create a database connection
              $connection = new mysqli($host, $username, $password, $database);

              // Checking if the connection was successful
              if ($connection->connect_error) {
                die('Database connection failed: ' . $connection->connect_error);
              }

              // Query to retrieve data from the database table
              $query = "SELECT * FROM products";

              // Executing the query
              $result = $connection->query($query);

              // Checking if there are any rows returned
              if ($result->num_rows > 0) {
                // Fetching data from each row and fill the table
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['product_id'] . "</td>";
                  echo "<td>" . $row['product_name'] . "</td>";
                  echo "<td>" . $row['price'] . "</td>";
                  echo "<td>" . $row['stock_quantity'] . "</td>";
                
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
              }

              // Closing the database connection
              $connection->close();
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>
</body>
</html>
