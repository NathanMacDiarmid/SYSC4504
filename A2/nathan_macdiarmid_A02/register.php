<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register on SYSCX</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php
if (isset ($_POST["submit"])) {
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $dob = $_POST["DOB"];
   $student_email = $_POST["student_email"];
   $program = $_POST["program"];

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "nathan_macdiarmid_syscx";
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
      echo "Connection error: " . mysqli_connect_error();
   }

   $sql = "insert into users_info (student_email, first_name, last_name, dob) values ('$student_email', '$first_name', '$last_name', '$dob')";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $get_all_id = "select student_id from users_info";

   $result = mysqli_query($conn, $get_all_id);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $student_id = end($final_result)["student_id"];

   $sql = "insert into users_program values ('$student_id', '$program')";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sql = "insert into users_avatar values ('$student_id', NULL)";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sql = "insert into users_address values ('$student_id', NULL, NULL, NULL, NULL, NULL)";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   header('Location: profile.php');

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
         <h2>Register a new profile</h2>
         <form action="" method="post">
            <fieldset>
               <legend>
                  <span>Personal Information</span>
               </legend>
               <label for="first_name" class="formInput">First Name:</label>
               <input name="first_name" id="first_name" type="text">
               <label for="last_name">Last Name:</label>
               <input name="last_name" id="last_name" type="text">
               <label for="DOB">DOB:</label>
               <input name="DOB" id="DOB" type="date">
               <div class="pageHeader">
                  <span>Profile Information</span>
               </div>
               <label for="student_email" class="formInput">Email:</label>
               <input name="student_email" id="student_email" type="text">
               <br>
               <label for="program" class="formInput">Program:</label>
               <select name="program" id="program">
                  <option>Choose Program</option>
                  <option>Computer Systems Engineering</option>
                  <option>Software Engineering</option>
                  <option>Communications Engineering</option>
                  <option>Biomedical and Electrical Engineering</option>
                  <option>Electrical Engineering</option>
                  <option>Special</option>
               </select>
               <br>
               <input name="submit" type="submit" value="Register">
               <input type="reset">
            </fieldset>
         </form>
      </section>
   </main>
</body>

</html>