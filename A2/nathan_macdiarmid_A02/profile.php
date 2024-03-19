<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Update SYSCX profile</title>
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
         <h2>Update Profile information</h2>
         <form action="https://ramisabouni.com/sysc4504/process_profile.php" method="post">
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
                  <span>Address</span>
               </div>
               <label for="street_number" class="formInput">Street Number:</label>
               <input name="street_number" id="street_number" type="text">
               <label for="street_name" class="formInput">Street Name:</label>
               <input name="street_name" id="street_name" type="text">
               <br>
               <label for="city" class="formInput">City:</label>
               <input name="city" id="city" type="text">
               <label for="province" class="formInput">Province:</label>
               <input name="province" id="province" type="text">
               <label for="postal_code" class="formInput">Postal Code:</label>
               <input name="postal_code" id="postal_code" type="text">
               <div class="pageHeader">
                  <span>Profile Information</span>
               </div>
               <label for="student_email" class="formInput">Email Address:</label>
               <input name="student_email" id="student_email" type="text">
               <br>
               <select name="program" class="formInput">
                  <option>Choose Program</option>
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
               <input type="radio" name="avatar"><img src="/A1/nathan_macdiarmid_A01/images/img_avatar1.png"
                  alt="image1" class="avatar">
               <input type="radio" name="avatar"><img src="/A1/nathan_macdiarmid_A01/images/img_avatar2.png"
                  alt="image2" class="avatar">
               <input type="radio" name="avatar"><img src="/A1/nathan_macdiarmid_A01/images/img_avatar3.png"
                  alt="image3" class="avatar">
               <input type="radio" name="avatar"><img src="/A1/nathan_macdiarmid_A01/images/img_avatar4.png"
                  alt="image4" class="avatar">
               <input type="radio" name="avatar"><img src="/A1/nathan_macdiarmid_A01/images/img_avatar5.png"
                  alt="image5" class="avatar">
               <br>
               <input type="submit">
               <input type="reset">
            </fieldset>
         </form>
      </section>
   </main>
</body>

</html>