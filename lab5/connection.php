<?php
    $servername = 'localhost';
    $dbname = 'nathan_macdiarmid_lab05';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		echo "Connection error: " . mysqli_connect_error();
	} else {
        echo "Connected Successfully";
    }

    mysqli_close($conn);
?>