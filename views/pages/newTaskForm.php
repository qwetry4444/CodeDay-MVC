<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Http\RequestInterface $request
 */
?>

<?php $view->component('start'); ?>


<div class="container">
    <div class="add_new_task_form_box">
        <form method="post" action="/newTaskForm" enctype="multipart/form-data">
            <h2>Create new task</h2>
            <div class="input-box">
                <input type="text" name="taskName" required value=<?php echo $request->getFromCookie('taskName')?>>
                <label for="taskName">Task name</label>
            </div>
            <div class="input-box">
                <select name="topic">
                    <option value="0" <?php echo ($request->getFromCookie('topic') === '0') ? 'selected' : ''?>>Array</option>
                    <option value="1" <?php echo ($request->getFromCookie('topic') === '1') ? 'selected' : ''?>>Tree</option>
                    <option value="2" <?php echo ($request->getFromCookie('topic') === '2') ? 'selected' : ''?>>Binary</option>
                </select>
                <label for="topic">Topic</label>
            </div>
            <div class="input-box">
                <select name="complexity">
                    <option value="0" <?php echo ($request->getFromCookie('complexity') === '0') ? 'selected' : ''?>>Easy</option>
                    <option value="1" <?php echo ($request->getFromCookie('complexity') === '1') ? 'selected' : ''?>>Middle</option>
                    <option value="2" <?php echo ($request->getFromCookie('complexity') === '2') ? 'selected' : ''?>>Hard</option>
                </select>
                <label for="complexity">Complexity</label>
            </div>

            <div class="input-box">
                <textarea class="input_stat" name="description" cols="36" rows="10" ><?php echo $request->getFromCookie('description')?></textarea>
                <label class="label_stat" for="description">Description</label>
            </div>
            <div class="input-box">
                <input class="input_stat" type="file" name="tests">
                <label for="tests">Add a file with tests for your task</label>   
            </div>

            <button type="Submit">Add new Task</button>
            <div class="status">
        </div>
        </form>
    </div>
</div>

<?php $view->component('end'); ?>
