<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_login') or die('Unable to connect');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6;
            background-image: url('bg.jpg');
            text-align: center;
            padding-top: 100px;
        }

        h2 {
            color:black;
        }

        .form-container {
            display: inline-block;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .field {
            margin-bottom: 20px;
            padding: 10px;
            width: 250px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .field::placeholder {
            color: #999;
        }

        .field:focus {
            outline: none;
            border-color: #66afe9;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            opacity: 0.8;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <div class="form-container">
        <form action="index.php" method="post">
            <input type="text" class="field" name="Username" placeholder="Username" required><br>
            <input type="password" class="field" name="Pass" placeholder="Password" required><br>
            <input type="submit" class="button" name="login" value="Login">
        </form>
        <?php
        if (isset($_POST['login'])) {
            $Username = $_POST['Username'];
            $Pass = $_POST['Pass'];

            $select = mysqli_query($conn, "SELECT * FROM db_user WHERE Username = '$Username' AND Pass = '$Pass'");
            $row = mysqli_fetch_array($select);

            if (is_array($row)) {
                $_SESSION["Username"] = $row['Username'];
                $_SESSION["Pass"] = $row['Pass'];
            } else {
                echo '<p class="error-message">Invalid Username/Password</p>';
            }
        }
        if (isset($_SESSION["Username"])) {
            header("Location: login.php");
        }
        ?>
    </div>
</body>
</html>
