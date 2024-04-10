<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Update SYSCX profile</title>
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
$db_first_name = end($final_result)["first_name"];
$db_last_name = end($final_result)["last_name"];
$db_dob = end($final_result)["dob"];
$db_email = end($final_result)["student_email"];

$sql = "select * from users_program where student_id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $student_id);
$statement->execute();
$result = $statement->get_result();
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_program = end($final_result)["Program"];

$sql = "select * from users_address where student_id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $student_id);
$statement->execute();
$result = $statement->get_result();
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_street_number = end($final_result)["street_number"];
$db_street_name = end($final_result)["street_name"];
$db_city = end($final_result)["city"];
$db_province = end($final_result)["province"];
$db_postal_code = end($final_result)["postal_code"];

$sql = "select * from users_avatar where student_id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $student_id);
$statement->execute();
$result = $statement->get_result();
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_avatar = end($final_result)["avatar"];

mysqli_close($conn);

if (isset($_POST["submit"])) {
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $dob = $_POST["DOB"];
   $street_number = $_POST["street_number"];
   $street_name = $_POST["street_name"];
   $city = $_POST["city"];
   $province = $_POST["province"];
   $postal_code = $_POST["postal_code"];
   $email = $_POST["student_email"];
   $program = $_POST["program"];
   $avatar = $_POST["avatar"];

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

   $sql = "update users_info set student_email = ?, first_name = ?, last_name = ?, dob = ? where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('ssssi', $email, $first_name, $last_name, $dob, $student_id);
   $statement->execute();

   $sql = "update users_address set street_number = ?, street_name = ?, city = ?, province = ?, postal_code = ? where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('sssssi', $street_number, $street_name, $city, $province, $postal_code, $student_id);
   $statement->execute();

   $sql = "update users_program set program = ? where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('si', $program, $student_id);
   $statement->execute();

   $sql = "update users_avatar set avatar = ? where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('si', $avatar, $student_id);
   $statement->execute();

   header('Location: profile.php');

   $sql = "select * from users_info";
   $statement = $conn->prepare($sql);
   $statement->bind_param('si', $avatar, $student_id);
   $statement->execute();
   $result = $statement->get_result();
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];
   $db_first_name = end($final_result)["first_name"];
   $db_last_name = end($final_result)["last_name"];
   $db_dob = end($final_result)["dob"];
   $db_email = end($final_result)["student_email"];

   $sql = "select * from users_program where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('i', $student_id);
   $statement->execute();
   $result = $statement->get_result();
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $db_program = end($final_result)["Program"];

   $sql = "select * from users_address where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('i', $student_id);
   $statement->execute();
   $result = $statement->get_result();
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $db_street_number = end($final_result)["street_number"];
   $db_street_name = end($final_result)["street_name"];
   $db_city = end($final_result)["city"];
   $db_province = end($final_result)["province"];
   $db_postal_code = end($final_result)["postal_code"];

   $sql = "select * from users_avatar where student_id = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('i', $student_id);
   $statement->execute();
   $result = $statement->get_result();
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $db_avatar = end($final_result)["avatar"];

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
      if ($_SESSION['account_type'] == 0) {
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
         <h2>Update Profile information</h2>
         <form action="" method="post">
            <fieldset>
               <legend>
                  <span>Personal Information</span>
               </legend>
               <label for="first_name" class="formInput">First Name:</label>
               <input name="first_name" id="first_name" type="text" value="<?php echo $db_first_name; ?>">
               <label for="last_name">Last Name:</label>
               <input name="last_name" id="last_name" type="text" value="<?php echo $db_last_name; ?>">
               <label for="DOB">DOB:</label>
               <input name="DOB" id="DOB" type="date" value="<?php echo $db_dob; ?>">
               <div class="pageHeader">
                  <span>Address</span>
               </div>
               <label for="street_number" class="formInput">Street Number:</label>
               <input name="street_number" id="street_number" type="text" value="<?php echo $db_street_number; ?>">
               <label for="street_name" class="formInput">Street Name:</label>
               <input name="street_name" id="street_name" type="text" value="<?php echo $db_street_name; ?>">
               <br>
               <label for="city" class="formInput">City:</label>
               <input name="city" id="city" type="text" value="<?php echo $db_city; ?>">
               <label for="province" class="formInput">Province:</label>
               <input name="province" id="province" type="text" value="<?php echo $db_province; ?>">
               <label for="postal_code" class="formInput">Postal Code:</label>
               <input name="postal_code" id="postal_code" type="text" value="<?php echo $db_postal_code; ?>">
               <div class="pageHeader">
                  <span>Profile Information</span>
               </div>
               <label for="student_email" class="formInput">Email Address:</label>
               <input name="student_email" id="student_email" type="text" value="<?php echo $db_email; ?>">
               <br>
               <select name="program" class="formInput">
                  <option>
                     <?php echo $db_program; ?>
                  </option>
                  <option>Computer Systems Engineering</option>
                  <option>Software Engineering</option>
                  <option>Communications Engineering</option>
                  <option>Biomedical and Electrical Engineering</option>
                  <option>Electrical Engineering</option>
                  <option>Special</option>
               </select>
               <br>
               <label class="formInput">Choose your Avatar:</label>
               <br>
               <?php
               for ($i = 0; $i < 5; $i++) {
                  $img_path = "images/img_avatar" . ($i + 1) . ".png";
                  if ($i + 1 == $db_avatar) {
                     echo "<input type='radio' name='avatar' value='" . ($i + 1) . "' checked>";
                     echo "<img src='" . $img_path . "' alt='image" . $i . "' class='avatar'>";
                  } else {
                     echo "<input type='radio' name='avatar' value='" . ($i + 1) . "'>";
                     echo "<img src='" . $img_path . "' alt='image" . $i . "' class='avatar'>";
                  }
               }

               ?>
               <br>
               <input name="submit" type="submit">
               <input type="reset">
            </fieldset>
         </form>
      </section>
   </main>
</body>

</html>