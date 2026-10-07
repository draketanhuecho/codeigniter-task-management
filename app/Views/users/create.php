<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h2>New User</h2>

<?php $validation = session('validation'); ?>

<form action="<?= base_url('users/store') ?>" method="post">
    <?= csrf_field() ?>

    <div>
        <label>Username:</label>
        <input type="text" name="username" value="<?= old('username') ?>">
        <?php if ($validation && $validation->hasError('username')): ?>
            <div style="color:red;"><?= $validation->getError('username') ?></div>
        <?php endif; ?>
    </div>

    <div>
        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
        <?php if ($validation && $validation->hasError('full_name')): ?>
            <div style="color:red;"><?= $validation->getError('full_name') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Save User</button>
</form>
<?= $this->endSection() ?>