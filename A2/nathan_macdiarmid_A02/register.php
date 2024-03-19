<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Register on SYSCX</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

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
      <img src="/A1/nathan_macdiarmid_A01/images/img_avatar3.png" alt="Profile Photo">
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
         <form action="https://ramisabouni.com/sysc4504/process_register.php" method="post">
            <fieldset>
               <legend>
                  <span>Personal Information</span>
               </legend>
               <label for="first_name" class="formInput">First Name:</label>
               <input name="first_name" id="first_name" type="text">
               <label for="last_name">Last Name:</label>
               <input name="last_name" id="last_name" type="text">
               <label for="DOB">DOB:</label>
               <input name="DOB" id="DOB" type="text">
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
               <input type="submit" value="Register">
               <input type="reset">
            </fieldset>
         </form>
      </section>
   </main>
</body>

</html>