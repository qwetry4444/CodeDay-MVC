<?php 
require_once __DIR__.'/../components/start.php';

/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Models\Task $task
 * @var \App\Models\Decision $decision
 */
$user = $auth->user();
?>

<div class="task_container">
    <div class="row task_about-solving">
        <div class="col-sm-5 task_about">
            <div class="row">
                <div class="col-12">
                    <h2><b><?php echo $task->number()?>.<?php echo $task->name() ?></b></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h3 class="topic">Topic: <?php echo $task->topic() ?></h3>
                    
                </div>
                <div class="col-6">
                    <h3 class="complexity">Complexity: <?php echo $task->complexity() ?></h3>
                </div>
            </div>
            <div class="row">
                <h3>Description.</h3></b>
                <p><?php echo $task->description() ?></p>
            </div>
            <div class="row">
                <h3>Task statistic</h3>
            </div>      
            <div class="row">
                <div class="col-4">
                    <h4 >Number of attempts: <?php echo $task->task_statistics()->count_try() ?></h4>
                </div>
                <div class="col-4">
                    <h4>Number of successful attempts: <?php echo $task->task_statistics()->count_successful_try() ?></h4>
                </div>    
                <div class="col-4">
                    <h4>Solvability percentage: <?php echo $task->task_statistics()->solvability_percentage()?>%</h4>
                </div>
            </div>
            <div class="row evaluation">
                <div class="col-6 like_block">
                    <a href="../evaluation_processing.php?task_id=<?php echo($task_id)?>&amp;type=1">
                        <div class="eval_link">
                            <img src="/assets/img/like.png" alt="like" class="like">
                            <h4>Count likes: <?php echo $task->task_statistics()->count_like() ?></h4>
                        </div>    
                    </a>
                </div>
                
                <div class="col-6 dislike_block">
                    <a href="../evaluation_processing.php?task_id=<?php echo($task_id)?>&amp;type=0">
                        <div class="eval_link">
                            <img src="/assets/img/dislike.png" alt="dislike" class="dislike">
                            <h4>Count dislikes: <?php echo $task->task_statistics()->count_dislike() ?></h4> 
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-5 task_solving">
            <form action="../submit_task.php?task_id=<?php echo $task_id?>" method="post">
                <div class="select_pl">
                    <select name="pl" id="pl" required>
                        <option selected disabled value="">Select PL</option>
                        <option value="Python">Python</option>
                        <option value="C">C</option>
                        <option value="Cpp">C++</option>
                    </select>
                </div>
                <textarea name="program_code" id="program_code" cols="80" rows="29" class="code_field"><?php echo($decision->code())?></textarea>
                <div class="submit_block">
                    <button type="sumbit" class="submit_task">Submit</button>
                </div>
            </form>
        </div>
        
    </div>
</div>

<?php
require_once __DIR__.'/../components/end.php';
?>