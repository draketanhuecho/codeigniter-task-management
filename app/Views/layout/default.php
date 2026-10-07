<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
</head>
<body>
    <nav>
        <a href="<?= base_url('customers') ?>">Customers</a> | 
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>
    <hr>

    <?= $this->renderSection('content') ?>
</body>
</html>