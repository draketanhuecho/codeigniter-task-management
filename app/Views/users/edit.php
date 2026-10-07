<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h2>Edit User</h2>

<?php $validation = session('validation'); ?>

<form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div>
        <label>Username:</label>
        <input type="text" name="username" value="<?= old('username', $user['username']) ?>">
        <?php if ($validation && $validation->hasError('username')): ?>
            <div style="color:red;"><?= $validation->getError('username') ?></div>
        <?php endif; ?>
    </div>

    <div>
        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?= old('full_name', $user['full_name']) ?>">
        <?php if ($validation && $validation->hasError('full_name')): ?>
            <div style="color:red;"><?= $validation->getError('full_name') ?></div>
        <?php endif; ?>
    </div>

    <div>
        <label>Current Avatar:</label><br>
        <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'uploads/' . $user['avatar'])): ?>
            <img src="<?= base_url('uploads/' . $user['avatar']) ?>" alt="Avatar" width="80" height="80">
        <?php else: ?>
            <img src="<?= base_url('images/placeholder.png') ?>" alt="Placeholder" width="80" height="80">
        <?php endif; ?>
    </div>

    <div>
        <label>Upload New Avatar (JPG/PNG, Max 2MB):</label>
        <input type="file" name="avatar" accept="image/png, image/jpeg">
        <?php if ($validation && $validation->hasError('avatar')): ?>
            <div style="color:red;"><?= $validation->getError('avatar') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Update User</button>
</form>
<?= $this->endSection() ?>