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
if (isset($_POST["submit"])) {
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $dob = $_POST["DOB"];
   $student_email = $_POST["student_email"];
   $program = $_POST["program"];
   $student_password1 = $_POST["student_password1"];
   $student_password1 = password_hash($student_password1, PASSWORD_BCRYPT);

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "nathan_macdiarmid_syscx";
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
      echo "Connection error: " . mysqli_connect_error();
   }

   $sql = "select * from users_info where student_email = ?";
   $statement = $conn->prepare($sql);
   $statement->bind_param('s', $student_email);
   $statement->execute();
   $result = $statement->get_result();

   if ($result->num_rows == 0) {
      $sql = "insert into users_info (student_email, first_name, last_name, dob) values (?, ?, ?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('ssss', $student_email, $first_name, $last_name, $dob);
      $statement->execute();
      $result = $statement->get_result();

      $get_all_id = "select student_id from users_info";
      $statement = $conn->prepare($get_all_id);
      $statement->execute();
      $result = $statement->get_result();
      $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $student_id = end($final_result)["student_id"];

      $sql = "insert into users_program values (?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('is', $student_id, $program);
      $statement->execute();

      $null = NULL;

      $sql = "insert into users_avatar values (?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('is', $student_id, $null);
      $statement->execute();

      $sql = "insert into users_address values (?, ?, ?, ?, ?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('isssss', $student_id, $null, $null, $null, $null, $null);
      $statement->execute();

      $sql = "insert into users_passwords values (?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('is', $student_id, $student_password1);
      $statement->execute();

      $reg_user = 1;

      $sql = "insert into users_permissions values (?, ?)";
      $statement = $conn->prepare($sql);
      $statement->bind_param('ii', $student_id, $reg_user);
      $statement->execute();

      header('Location: login.php');
   } else {
      header('Location: register.php');
   }

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
               <label for="student_password1" class="formInput">Password:</label>
               <input name="student_password1" id="student_password1" type="text">
               <label for="student_password2" class="formInput">Confirm Password:</label>
               <input name="student_password2" id="student_password2" type="text">
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
               <input name="submit" type="submit" id="submit" value="Register">
               <input type="reset">
            </fieldset>
         </form>
      </section>
   </main>
</body>

<script>
   document.getElementById("student_password2").addEventListener("input", function () {
      var password = document.getElementById("student_password1").value;
      var confirmPassword = this.value;
      var submitButton = document.getElementById("submit");

      if (password !== confirmPassword) {
         passwordError.innerHTML = "<span style='color: red;'>Passwords do not match</span>";
         passwordError.disabled = true;
      } else {
         passwordError.innerHTML = "";
         passwordError.disabled = false;
      }
   });
</script>

</html>