<html>
    <body>
        <?php 
            require_once 'connect.php';
            
            session_start();

            if (isset($_POST['submit'])) {
                $task = $_POST['task'];
                $sql = "INSERT INTO input (txt) VALUES ('$task')";
                
                if (mysqli_query($database, $sql)) {
                    $_SESSION['message'] = "Task has been added !";
                    $_SESSION['msg_type'] = "success";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($database);
                }
                header("location: index.php");
            }
        ?>
    </body>
</html>