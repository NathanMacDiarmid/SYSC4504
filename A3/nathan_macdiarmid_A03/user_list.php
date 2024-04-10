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
            <h2>User Information</h2>
            <?php
            if ($_SESSION['account_type'] != 0) {
                echo "<p>Permission denied</p>";
            } else {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Program</th>
                        <th>Account Type</th>
                    </tr>
                </thead>
                <tbody>
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
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $result = $statement->get_result();

                    $sql = "select * from users_program";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $result2 = $statement->get_result();

                    $sql = "select * from users_permissions";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $result3 = $statement->get_result();

                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row = $result->fetch_assoc();
                        $student_id = $row['student_id'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $email = $row['student_email'];

                        $row = $result2->fetch_assoc();
                        $program = $row['Program'];

                        $row = $result3->fetch_assoc();
                        $account_type = $row['account_type'];
                        echo "<tr>
                        <td>$student_id</td>
                        <td>$first_name</td>
                        <td>$last_name</td>
                        <td>$email</td>
                        <td>$program</td>
                        <td>$account_type</td>
                    </tr>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <?php
            }?>
        </section>
    </main>
</body>

</html>