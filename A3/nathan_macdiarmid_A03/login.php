<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register on SYSCX</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   <?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "nathan_macdiarmid_syscx";
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
      echo "Connection error: " . mysqli_connect_error();
   }

   if (isset($_POST["submit"])) {
      $login_email = $_POST["login_email"];
      $login_password = $_POST["login_password"];

      $sql = "select ui.student_id from users_info ui join users_passwords up on ui.student_id = up.student_id where ui.student_email = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('s', $login_email);
      $statement->execute();
      $result = $statement->get_result();
      $student_id = $result->fetch_column(0);

      $sql = "select password from users_passwords where student_id = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('i', $student_id);
      $statement->execute();
      $result = $statement->get_result();
      $pw = $result->fetch_column(0);

      $sql = "select account_type from users_permissions where student_id = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('i', $student_id);
      $statement->execute();
      $result = $statement->get_result();
      $account_type = $result->fetch_column(0);

      if (password_verify($login_password, $pw)) {
         $_SESSION['student_id'] = $student_id;
         $_SESSION['account_type'] = $account_type;
         header('Location: index.php');
      } else {
         header('Location: login.php');
      }
   }
   ?>
   <header>
      <h1>SYSCX</h1>
      <p>Social media for SYSC students in Carleton University</p>
   </header>
   <nav>
      <a href="index.php">
         <h3>
            Home
         </h3>
      </a>
      <a href="register.php">
         <h3>
            Register
         </h3>
      </a>
      <a href="login.php">
         <h3>
            Login
         </h3>
      </a>
   </nav>
   <div class="userInfo">
   </div>
   <section>
      <form action="" method="post">
         <fieldset>
            <legend>
               <span>Login</span>
            </legend>
            <label for="login_email">Email: </label>
            <input type="text" name="login_email">
            <br>
            <label for="login_password">Password: </label>
            <input type="text" name="login_password">
            <br>
            <input type="submit" name="submit" value="Login">
            <a href="register.php">Click here to register!</a>
         </fieldset>
      </form>
   </section>
</body>

</html>