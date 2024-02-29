<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var array<\App\Models\Task> $tasks
 */
require_once __DIR__.'/../components/start.php';
?>

<div class="container_tasks">
    <div class="row task task_menu">
        <div class="col-1">Number</div>
        <div class="col-3">Title</div>
        <div class="col-2">Topic</div>
        <div class="col-2">Complexity</div>
        <div class="col-2">Solvability %</div>
        <div class="col-1"><img src="/assets/img/like_white.png" alt="like" class="like"></div>
        <div class="col-1"><img src="/assets/img/dislike_white.png" alt="dislike" class="dislike"></div>
    </div>
    <div class="tasks">
        <?php
            foreach($tasks as $task)
            {
        ?>

        <form action="/task" method="post">
            <button>
                <input type="hidden" name="task_id" value="<?php echo $task->id(); ?>">
                <div class="row task">
                    <div class="col-1">
                        <?php 
                        echo $task->number();
                        ?>
                    </div>
                    <div class="col-3">
                        <?php
                        echo $task->name();
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                        echo $task->topic();
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                        echo $task->complexity();
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                        echo $task->task_statistics()->solvability_percentage();
                        ?>
                    </div>
                    <div class="col-1">
                        <?php
                        echo $task->task_statistics()->count_like();
                        ?>
                    </div>
                    <div class="col-1">
                        <?php
                        echo $task->task_statistics()->count_dislike();
                        ?>
                    </div>
                </div>
            </button>
        </form>

        <?php
            }
        ?>
    </div>
</div>
<?php require_once __DIR__.'/../components/end.php'; ?>
