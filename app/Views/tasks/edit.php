<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-container { max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; }
        .errors { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Task</h2>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="errors">
                <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/tasks/update/' . $task['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Task Title</label>
                <input type="text" name="title" value="<?= esc($task['title']) ?>" required>
            </div>
            <div class="form-group">
                <label>Task Date</label>
                <input type="date" name="task_date" value="<?= esc($task['task_date']) ?>" required>
            </div>
            <button type="submit">Update Task</button>
            <a href="<?= base_url('/tasks') ?>">Cancel</a>
        </form>
    </div>
</body>
</html>