<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Update SYSCX profile</title>
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
$db_first_name = end($final_result)["first_name"];
$db_last_name = end($final_result)["last_name"];
$db_dob = end($final_result)["dob"];
$db_email = end($final_result)["student_email"];

$sql = "select * from users_program where student_id = '$student_id'";
$result = mysqli_query($conn, $sql);
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_program = end($final_result)["Program"];

$sql = "select * from users_address where student_id = '$student_id'";
$result = mysqli_query($conn, $sql);
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_street_number = end($final_result)["street_number"];
$db_street_name = end($final_result)["street_name"];
$db_city = end($final_result)["city"];
$db_province = end($final_result)["province"];
$db_postal_code = end($final_result)["postal_code"];

$sql = "select * from users_avatar where student_id = '$student_id'";
$result = mysqli_query($conn, $sql);
$final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$db_avatar = end($final_result)["avatar"];

mysqli_close($conn);

if (isset ($_POST["submit"])) {
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
   $result = mysqli_query($conn, $sql);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];

   $sql = "update users_info set student_email = '$email', first_name = '$first_name', last_name = '$last_name', dob = '$dob' where student_id = '$student_id'";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sql = "update users_address set street_number = '$street_number', street_name = '$street_name', city = '$city', province = '$province', postal_code = '$postal_code' where student_id = '$student_id'";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sql = "update users_program set program = '$program' where student_id = '$student_id'";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sql = "update users_avatar set avatar = '$avatar' where student_id = '$student_id'";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   header('Location: profile.php');

   $sql = "select * from users_info";
   $result = mysqli_query($conn, $sql);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];
   $db_first_name = end($final_result)["first_name"];
   $db_last_name = end($final_result)["last_name"];
   $db_dob = end($final_result)["dob"];
   $db_email = end($final_result)["student_email"];

   $sql = "select * from users_program where student_id = '$student_id'";
   $result = mysqli_query($conn, $sql);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $db_program = end($final_result)["Program"];

   $sql = "select * from users_address where student_id = '$student_id'";
   $result = mysqli_query($conn, $sql);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $db_street_number = end($final_result)["street_number"];
   $db_street_name = end($final_result)["street_name"];
   $db_city = end($final_result)["city"];
   $db_province = end($final_result)["province"];
   $db_postal_code = end($final_result)["postal_code"];

   $sql = "select * from users_avatar where student_id = '$student_id'";
   $result = mysqli_query($conn, $sql);
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