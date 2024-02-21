<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_tasks.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;500&display=swap" rel="stylesheet"><title>Document</title>
</head>
<body>

    <?php
        include '../connect.php';
        include '../get_tasks.php';
    ?>
        <div class="container_tasks">
            <div class="row task task_menu">
                <div class="col-1">Number</div>
                <div class="col-3">Title</div>
                <div class="col-2">Topic</div>
                <div class="col-2">Complexity</div>
                <div class="col-2">Solvability %</div>
                <div class="col-1"><img src="../img/like_white.png" alt="like" class="like"></div>
                <div class="col-1"><img src="../img/dislike_white.png" alt="dislike" class="dislike"></div>
            </div>
            <div class="tasks">
                <?php
                    $dbconn = connect();
                    $tasks = get_tasks($dbconn);
                    foreach($tasks as $task)
                    {
                        $task_statistics = get_task_statistics($dbconn, $task, 1);
                        $task_id = $task['id'];
                        $_GET['task_id'] = $task_id;
                        $task_link = sprintf('task.php?task_id=%d', $task_id);
                ?>
                <?php echo("<a href=$task_link>") ?>
                    <div class="row task">
                        <div class="col-1">
                            <?php
                            echo $task['number'];
                            ?>
                        </div>
                        <div class="col-3">
                            <?php
                            echo $task['task_name'];
                            ?>
                        </div>
                        <div class="col-2">
                            <?php
                            echo $task['topic'];
                            ?>
                        </div>
                        <div class="col-2">
                            <?php
                            echo $task['complexity'];
                            ?>
                        </div>
                        <div class="col-2">
                            <?php
                            echo $task_statistics[0]['solvability_percentage'];
                            ?>
                        </div>
                        <div class="col-1">
                            <?php
                            echo $task_statistics[0]['count_like'];
                            ?>
                        </div>
                        <div class="col-1">
                            <?php
                            echo $task_statistics[0]['count_dislike'];
                            ?>
                        </div>
                    </div>
                </a>
    <?php
        }
    ?>
            </div>
        </div>
</body>
</html>