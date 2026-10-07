<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List - Tasks for Today</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; }
        .btn-add { background: #007bff; margin-bottom: 15px; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-delete { background: #dc3545; }
        .btn-logout { background: #6c757d; float: right; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <div>
        <h2>Tasks for Today</h2>
        <?php if (session()->get('logged_in')): ?>
            <a href="<?= base_url('/logout') ?>" class="btn btn-logout">Logout</a>
            <a href="<?= base_url('/tasks/new') ?>" class="btn btn-add">+ Add New Task</a>
        <?php else: ?>
            <a href="<?= base_url('/login') ?>" class="btn btn-add" style="background:#28a745;">Login to Manage Tasks</a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Task Date</th>
                <?php if (session()->get('logged_in')): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                        <?php if (session()->get('logged_in')): ?>
                            <td>
                                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>" class="btn btn-edit">Edit</a>
                                <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>" class="btn btn-delete" onclick="return confirm('Sigurado ka bang gustong i-archive ang task na ito?')">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No active tasks found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>