<!DOCTYPE html>

<!-- ANSWER 6725 -->

<html>

<head>

</head>

<body>
    <p>
        <?php
        /*
        Algorithm for getting the perfect background color!!:

        1- Initialize a variable $door_lock to 0.
        2- IMPORTANT: Use a for loop that iterates ELEVEN times.
        3- Inside the for loop, simulate a basic web development operation:
            3.a- Set $hex_color to "8A32CF"
            3.b- Convert the $hex_color color to its decimal equivalent
                (would hexdec() work for this??)
            3.c- Add the decimal value to the current $door_lock.
            3.d- Adjust the result to stay within the 4-digit limit.
            3.e- Update the $door_lock variable with the result.
        4- Print the final 4-digit $door_lock after the loop complete.
        */



		// .....

        $door_lock = 0;

        for ($i = 0; $i < 11; $i++) {
            $hex_color = "8A32CF";
            $door_lock += hexdec($hex_color);
            $door_lock %= 10000;
        }

        echo $door_lock;

        ?>

	</p>
</body>

</html>