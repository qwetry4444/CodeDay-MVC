<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style_main.css">
    <link rel="stylesheet" href="/assets/css/style_profile.css">
    <link rel="stylesheet" href="/assets/css/style_header.css">
    <link rel="stylesheet" href="/assets/css/style_add_new_task_form.css">

    <link rel="stylesheet" href="../login_page/css/light_theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;500&display=swap" rel="stylesheet"><title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>CodeDay</title>
</head>
<body>
    
    <?php
        require('header.php');
    ?>

    <?php
        if(!isset($_GET['page']))
            require("home.php");
        else
        {
            switch($_GET['page'])
            {
                case 'home':
                    require_once('home.php');
                    break;
            
                case 'tasks':
                    require_once('tasks.php');
                    break;
                
                case 'task':
                    require_once('task.php');
                    break;
                    
                case 'progress':
                    require_once('progress.php');
                    break;
    
                case 'login':
                    require_once('../login_page/login.php');
                    break;
    
                case 'profile':
                    require_once('profile.php');
                    break;
                
                case 'new_task_form':
                    require_once('new_task_form.php');
                    break;
                case 'register':
                    require_once('register.php');
                    break;
            }
        }
    ?>

    <?php
        require('footer.php');
    ?>
</body>
</html>
