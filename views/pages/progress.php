<?php 
require_once __DIR__.'/../components/start.php';

/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>

<div class="container profile">
    <div class="head">
        <h1>Progress</h1>
    </div>
    <div class="data">
        <div class="row">
            <h2 class="username">Username : <?php echo $user->name()?></h2>
        </div>
        <div class="row">
            <h3 class="preferred_pl">Preferred programming language : <?php echo $user->preferred_pl() ?></h3>
        </div>
        <div class="row"><h3 class="count_solved_easy_tasks">Count solved easy tasks : <?php echo $user->progress()->count_solved_easy_tasks() ?></h3>
        </div>
        <div class="row">
            <h3 class="count_solved_middle_tasks">Count solved middle tasks : <?php echo $user->progress()->count_solved_middle_tasks() ?></h3></div>
        <div class="row"><h3 class="count_solved_hard_tasks">Count solved hard tasks : <?php echo $user->progress()->count_solved_hard_tasks() ?></h3></div>

        <div class="row">
            <h3 class="count_solved_tasks_with_c">Count solved tasks with c : <?php echo $user->progress()->count_solved_tasks_with_c() ?></h3>
        </div>
        <div class="row">
            <h3 class="count_solved_tasks_with_cpp">Count solved tasks with cpp : <?php echo $user->progress()->count_solved_tasks_with_cpp() ?></h3>
        </div>
        <div class="row">
            <h3 class="count_solved_tasks_with_python">Count solved tasks with python : <?php echo $user->progress()->count_solved_tasks_with_python() ?></h3>
        </div>
    </div>
</div>

<?php
require_once __DIR__.'/../components/end.php';
?>