<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register on SYSCX</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   <main>
      <section>
         <form action="" method="post">
            <fieldset>
               <legend>
                  <span>Add student information</span>
               </legend>
               <label for="student_id" class="formInput">ID:</label>
               <input name="student_id" id="student_id" type="text">
               <label for="student_name">NAME:</label>
               <input name="student_name" id="student_name" type="text">
               <label for="DOB">DOB:</label>
               <input name="DOB" id="DOB" type="date">
               <label for="course_id" class="formInput">COURSE ID:</label>
               <input name="course_id" id="course_id" type="text">
               <label for="student_income" class="formInput">INCOME:</label>
               <input name="student_income" id="student_income" type="text">
               <input name="submit" type="submit" value="Submit Query">
            </fieldset>
         </form>
      </section>
   </main>
</body>

<?php
if (isset ($_POST["submit"])) {
   $servername = "localhost";
   $dbname = "nathan_macdiarmid_lab05";
   $username = "root";
   $password = "";

   $conn = mysqli_connect($servername, $username, $password, $dbname);

   if (!$conn) {
      echo "Connection error: " . mysqli_connect_error();
   }

   $student_id = $_POST["student_id"];
   $student_name = $_POST["student_name"];
   $DOB = $_POST["DOB"];
   $course_id = $_POST["course_id"];
   $student_income = $_POST["student_income"];

   $sql = "insert into student (id, name, dob, course_id, income) values ('$student_id', '$student_name', '$DOB', '$course_id', '$student_income')";

   if (!mysqli_query($conn, $sql)) {
      echo "SQL Error: " . mysqli_error($conn);
   }

   $sent_info_query = "select * from student where id = $student_id";

   $result = mysqli_query($conn, $sent_info_query);
   $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

   echo "<p>Connected Successfully</p>";

   echo "<strong>Course record created successfully!!!</strong><br><br>";

   echo "<strong>ID: </strong>";

   echo $final_result[0]["ID"];

   echo "<br><br><strong>NAME: </strong>";
   
   echo $final_result[0]["NAME"];

   echo "<br><br><strong>DOB: </strong>";

   echo $final_result[0]["DOB"];

   echo "<br><br><strong>COURSE ID: </strong>";

   echo $final_result[0]["COURSE_ID"];

   echo "<br><br><strong>INCOME: </strong>";

   echo $final_result[0]["INCOME"];

   mysqli_close($conn);
}
?>

</html>