<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brothers Todo App - UPDATED VERSION</title>

    <!-- css -->
    <style>
        body {
            background-color: #202223;
            font-size: 1.2em;
            color: #f6eee3;
            font-family: Arial, Helvetica, sans-serif;
            padding: 30px;
        }

        h1 {
            color: #778afc;
        }

        h2 {
            color: #ff6b4a;
        }

        p {
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        .underline {
            text-decoration: underline;
        }

        .name {
            background-color: black;
            color: white;
        }

        .task {
            line-height: 1.6em;
            padding: 10px;
            padding-left: 20px;
            margin-bottom: 5px;
        }

        .task:hover {
            background-color: #151616;
            color: #778afc;
        }

        .css-i6dzq1 {
            color: #ffb247;
        }

        .css-i6dzq1:hover {
            color: #b7bd2d;
        }

        .icon-done {
            color: #b7bd2d;
        }

        .date {
            font-size: .7em;
            font-style: italic;
            color: #ccc;
        }

        .input-add-task {
            border: 0;
            padding: 10px;
            width: 300px;
            border-radius: 5px;
        }

        .button-add-task {
            border-radius: 5px;
            border: 0;
            background-color: #778afc;
            color: #fff;
            padding: 10px 20px;
        }

        .button-add-task:hover {
            background-color: #343e7d;
            cursor: pointer;
        }

        .clear-search {
            color: #fff;
            text-decoration: underline;
        }

        .clear-search-p {
            margin-top: 10px;
        }

        .clear-search:hover {
            color: red;
        }

        .search-form {
            float: right;
            padding-top: 15px;
            padding-right: 30px;
        }

        .search-input {
            width: 200px;
        }
    </style>

    <!-- javascript -->
    <script>
        function confirm_function() {
            return confirm('do you really want to delete it?');
        }
    </script>
</head>

<body>
    <?php
    include 'connection.php';
    $searchString = !isset($_GET['search']) ? null : $_GET['search'];

    if ($searchString != '') {
        $content = $conn->query("SELECT * FROM tasks WHERE task LIKE '%$searchString%'");
    } else {
        $content = $conn->query('SELECT * FROM tasks');
    }
    ?>

    <form action="" class="search-form">
        <input class="input-add-task search-input" type="search" name="search" placeholder="type to search">
        <button class="button-add-task" type=" submit">search!</button>

        <?php if (!empty($searchString)) { ?>
            <p class="clear-search-p">
                <a class="clear-search" href="/">clear search results</a>
            </p>
        <?php } ?>
    </form>

    <h1>Todo List App</h1>
    <h2>Tasks for today, <span class="underline"><?php echo date('m-d-Y'); ?></span></h2>
    <h3 class="underline">Total of tasks: <?php echo $content->num_rows; ?></h3>

    <form action="process.php" method="post">
        <input class="input-add-task" type="text" name="task" placeholder="type the task you want to register" autofocus>
        <button class="button-add-task" type="submit">add task</button>
    </form>

    <ol>
        <?php foreach ($content as $data) { ?>
            <li class="task">
                <p>
                    <?php
                    if ($data['status'] == 1) {
                        echo '<s>' . $data['task'] . '</s>';
                    } else {
                        echo $data['task'];
                    }
                    ?>
                </p>
                <span class="date">
                    <?php echo $data['date']; ?>
                </span>

                <?php if ($data['status'] != 1) { ?>
                    <a href="done.php?id=<?php echo $data['id']; ?>">
                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon-done">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </a>
                <?php } ?>

                <a onclick="return confirm_function()" href="delete.php?id=<?php echo $data['id']; ?>">
                    <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </a>
            </li>
        <?php } ?>
    </ol>

</body>

</html>