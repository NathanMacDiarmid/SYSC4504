<?php
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

<?php
if ($_SESSION['student_id'] == null) {
   header('Location: login.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nathan_macdiarmid_syscx";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   echo "Connection error: " . mysqli_connect_error();
}

$sql = "select * from users_info";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->get_result();
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$student_id = end($final_result)["student_id"];

$sql = "select * from users_posts where student_id = ? order by post_date desc";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $student_id);
$statement->execute();
$result = $statement->get_result();
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
if (isset ($_POST["submit"])) {
   $new_post = $_POST["new_post"];

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "nathan_macdiarmid_syscx";
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
      echo "Connection error: " . mysqli_connect_error();
   }

   $sql = "select * from users_info";
   $statement = $conn->prepare($sql);
   $statement->execute();
   $result = $statement->get_result();
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];

   $sql = "insert into users_posts (student_id, new_post) values (?, ?)";
   $statement = $conn->prepare($sql);
   $statement->bind_param('is', $student_id, $new_post);
   $statement->execute();

   header('Location: index.php');

   mysqli_close($conn);
}
?>

<body>
   <header>
      <h1>SYSCX</h1>
      <p>Social media for SYSC students in Carleton University</p>
   </header>
   <nav>
        <?php
        if ($_SESSION['student_id'] == null) {
            echo "<a href='index.php'>
         <h3>
            Home
         </h3>
      </a>
      <a href='register.php'>
         <h3>
            Register
         </h3>
      </a>
      <a href='login.php'>
         <h3>
            Login
         </h3>
      </a>";
        } else if ($_SESSION['account_type'] == 0) {
            echo "<a href='index.php'>
         <h3>
            Home
         </h3>
      </a>
      <a href='profile.php'>
         <h3>
            Profile
         </h3>
      </a>
      <a href='user_list.php'>
         <h3>
            User List
         </h3>
      </a>
      <a href='logout.php'>
         <h3>
            Logout
         </h3>
      </a>";
        } else {
            echo "<a href='index.php'>
         <h3>
            Home
         </h3>
      </a>
      <a href='profile.php'>
         <h3>
            Profile
         </h3>
      </a>
      <a href='logout.php'>
         <h3>
            Logout
         </h3>
      </a>";
        }
        ?>
    </nav>
   <div class="userInfo">
      <?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "nathan_macdiarmid_syscx";
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
         echo "Connection error: " . mysqli_connect_error();
      }

      $sql = "select student_email from users_info where student_id = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('i', $_SESSION['student_id']);
      $statement->execute();
      $result = $statement->get_result();
      $email = $result->fetch_column(0);

      $sql = "select avatar from users_avatar where student_id = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('i', $_SESSION['student_id']);
      $statement->execute();
      $result = $statement->get_result();
      $result = $result->fetch_column(0);
      $avtr = 'images/img_avatar' . $result . '.png';

      $sql = "select Program from users_program where student_id = ?";
      $statement = $conn->prepare($sql);
      $statement->bind_param('i', $_SESSION['student_id']);
      $statement->execute();
      $result = $statement->get_result();
      $prgm = $result->fetch_column(0);

      echo "<h3>
      Nathan MacDiarmid
   </h3>
   <img src=$avtr alt='Profile Photo'>
   <h3>
      Email:
   </h3>
   <h3>
      $email
   </h3>
   <h3>
      Program: $prgm
   </h3>";
   mysqli_close($conn);
         ?>
   </div>
   <main>
      <section>
         <form action="" method="post">
            <fieldset>
               <legend>
                  <span>New Post</span>
               </legend>
               <textarea name="new_post" class="formInput"></textarea>
               <br>
               <input name="submit" type="submit">
               <input type="reset">
            </fieldset>
         </form>
         <?php
         for ($i = 0; $i < 10 && $i < count($final_result); $i++) {
            echo "<div class='post'>";
            echo "<details>
                        <summary>Post ";
            echo $i + 1;
            echo "&emsp;&emsp;";
            echo $final_result[$i]["post_date"];
            echo "</summary>";
            echo "<p>";
            echo $final_result[$i]["new_post"];
            echo "</p></details>";
            echo "</div>";
         }

         ?>
      </section>
   </main>
</body>

</html>