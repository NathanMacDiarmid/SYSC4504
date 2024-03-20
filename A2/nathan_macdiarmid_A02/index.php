<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register on SYSCX</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nathan_macdiarmid_syscx";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   echo "Connection error: " . mysqli_connect_error();
}

$sql = "select * from users_info";
$result = mysqli_query($conn, $sql);
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$student_id = end($final_result)["student_id"];

$sql = "select * from users_posts where student_id = '$student_id' order by post_date desc";
$result = mysqli_query($conn, $sql);
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
   $result = mysqli_query($conn, $sql);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];

   $sql = "insert into users_posts (student_id, new_post) values ('$student_id', '$new_post')";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

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
      <a href="index.php">
         <h3>
            Home
         </h3>
      </a>
      <a href="profile.php">
         <h3>
            Profile
         </h3>
      </a>
      <a href="register.php">
         <h3>
            Register
         </h3>
      </a>
      <a href="logout.php">
         <h3>
            Logout
         </h3>
      </a>
   </nav>
   <div class="userInfo">
      <h3>
         Nathan MacDiarmid
      </h3>
      <img src="images/img_avatar3.png" alt="Profile Photo">
      <h3>
         Email:
      </h3>
      <h3>
         <a href="mailto:nathanmacdiarmid@cmail.carleton.ca">nathanmacdiarmid@cmail.carleton.ca</a>
      </h3>
      <h3>
         Program: Software Engineering
      </h3>
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
         for ($i = 0; $i < 5 && $i < count($final_result); $i++) {
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