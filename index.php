<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script>
        function validateForm() {
            var x = document.forms["task_input"]["task"].value;
            if (x == "") {
                alert("Task is empty");
                return false;
            }
        }
    </script>
    <title>Document</title>
</head>
<body>
    <div class="container">
            <div class="header">
                <h1>Your To-Do list!</h1>
            </div>

            <form name="task_input" method="post" action="input.php" onsubmit="return validateForm()" class="input_form">
                <input type="text" name="task" class="task_input">
                <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
            </form>
        <?php
            require_once 'connect.php';

            $sql = "SELECT * FROM input";

            if ($result = mysqli_query($database, $sql)){
                if (mysqli_num_rows($result) > 0) {
        ?>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['txt'] ?></td>
                                <td><button type="submit" name="submit" id="delete_btn" class="delete_btn">Delete</button></td>
                            </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    mysqli_free_result($result);

                } else {
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not execute $sql. " . mysqli_error($link);
            }
        ?>
</body>
</html>