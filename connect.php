<?php
        $database = mysqli_connect("localhost", "root", null, "todo", 3306, null);
        if (!$database) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    ?>