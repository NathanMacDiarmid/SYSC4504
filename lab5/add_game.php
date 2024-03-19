<!DOCTYPE html>
<html lang="en">

<head>
    <title>PS5 Fan Page</title>
    <link rel="icon" href="images/2560px-PlayStation_logo.svg.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <div class="welcome">
            <h1>
                Playstation 5
            </h1>
            <h3>
                by: Nathan MacDiarmid
            </h3>
            <h4>
                February 14th, 2024
            </h4>
        </div>
        <ul>
            <li>
                <a href="catalog.html">Catalog</a>
            </li>
            <li>
                <a href="https://www.playstation.com/en-ca/">Playstation</a>
            </li>
            <li>
                <a href="contact.html">Contact us</a>
            </li>
            <li>
                <a href="add_game.php">Add Game</a>
            </li>
        </ul>
    </header>
    <form method="POST" action="">
        <fieldset>
            <legend>Add student information</legend>
            <label>Game Name: </label><input type="text" name="game_name"><br>
            <label>Release date: </label><input type="date" name="release_date"><br>
            <label>Price: </label><input type="text" name="game_price"><br>
            <label>Game Description: </label><br><textarea name="game_description" rows="4" cols="50"
                placeholder="max 500 characters"></textarea><br>
            <input name="submit" type="submit" name="submit">
        </fieldset>
    </form>

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

        $game_name = $_POST["game_name"];
        $release_date = $_POST["release_date"];
        $price = $_POST["game_price"];
        $description = $_POST["game_description"];

        $sql = "insert into game_details (game_name, release_date, game_price, game_description) values ('$game_name', '$release_date', '$price', '$description')";

        if (!mysqli_query($conn, $sql)) {
            echo "SQL Error: " . mysqli_error($conn);
        }

        $sent_info_query = "select * from game_details order by release_date desc";
        
        $result = mysqli_query($conn, $sent_info_query);
        $final_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo "<p>Connected Successfully</p>";

        echo "<strong>Course record created successfully!!!</strong><br><br>";

        echo "<table>";

        echo "<tr>
                <td><strong>#</strong>&emsp;&emsp;</td>
                <td><strong>Game ID</strong>&emsp;&emsp;&emsp;</td>
                <td><strong>Game Name</strong>&emsp;&emsp;&emsp;</td>
                <td><strong>Game Price</strong>&emsp;&emsp;&emsp;</td>
                <td><strong>Release Date</strong>&emsp;&emsp;&emsp;</td>
                <td><strong>Game Description</strong></td>
                </tr>";

        for ($i = 0; $i < count($final_result); $i++) {
            echo "<tr>
                    <td>";
            echo $i;
            echo "</td>";
            echo "<td>";
            echo $final_result[$i]["game_ID"];;
            echo "</td>";
            echo "<td>";
            echo $final_result[$i]["game_name"];;
            echo "</td>";
            echo "<td>";
            echo $final_result[$i]["release_date"];;
            echo "</td>";
            echo "<td>";
            echo $final_result[$i]["game_price"];;
            echo "</td>";
            echo "<td>";
            echo $final_result[$i]["game_description"];;
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);
    }
    ?>

    <footer>
        <p>
            Copyright &copy; Nathan MacDiarmid - Carleton University <a
                href="mailto:nathanmacdiarmid@cmail.carleton.ca">nathanmacdiarmid@cmail.carleton.ca</a>
        </p>
    </footer>
</body>

</html>