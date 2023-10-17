<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brothers Todo App - UPDATED VERSION</title>

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- javascript -->
    <script>
        function confirm_function() {
            return confirm('do you really want to delete it?');
        }
    </script>
</head>

<body>

    <!-- study here how html structure works -->
    <h1>Todo List</h1>
    <h2>Tasks for today, <?php echo date('m-d-Y'); ?></h2>

    <?php
    // connecting to the database
    $localserver = 'localhost';
    $username = 'root';
    $password = 'every1000';
    $database = 'todo';

    $conn = new mysqli($localserver, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $content = $conn->query('SELECT * FROM tasks');
    ?>

    <h3>Total of tasks: <?php echo $content->num_rows; ?></h3>

    <ul>
        <?php foreach ($content as $data) { ?>
            <li>
                <?php echo $data['id']; ?> -
                <?php echo $data['task']; ?> -
                <?php echo $data['date']; ?>

                <a onclick="return confirm_function()" href="delete.php?id=<?php echo $data['id']; ?>">DELETE</a>
            </li>
        <?php } ?>
    </ul>

    <form action="process.php" method="post">
        <input type="text" name="task" placeholder="type the task you want to register" autofocus>
        <button type="submit">add task</button>
    </form>

</body>

</html>