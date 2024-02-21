
<div class="container">
    <div class="add_new_task_form_box">
        <form method="post" action="../add_new_task.php">
            <h2>Create new task</h2>
            <div class="input-box">
                <input type="text" name="task_name" required>
                <label for="task_name">Task name</label>
            </div>
            <div class="input-box">
                <input type="text" name="topic" required>
                <label for="topic">Topic</label>
            </div>
            <div class="input-box">
                <input type="text" name="complexity" required>
                <label for="complexity">Complexity</label> 
            </div>
            <div class="input-box">
                <textarea class="input_stat" name="description" cols="36" rows="10"></textarea>
                <label class="label_stat" for="description">Description</label>
            </div>
            <div class="input-box">
                <input class="input_stat" type="file" name="tests" require>
                <label for="tests">Add a file with tests for your task</label>   
            </div>

            <button type="Submit">Add new Task</button>
            <div class="status">
            <?php
            if (isset($_SESSION['message']))
            {
                session_start(["use_strict_mode" => true]);
                echo ("<div class='session_message'>".$_SESSION['message']."</div>");
                unset($_SESSION['message']);
            }
            ?>
        </div>
        </form>
    </div>
</div>