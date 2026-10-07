<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h2>New Customer</h2>

<?php $validation = session('validation'); ?>

<form action="<?= base_url('customers/store') ?>" method="post">
    <?= csrf_field() ?>
    
    <div>
        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
        <?php if ($validation && $validation->hasError('full_name')): ?>
            <div style="color:red;"><?= $validation->getError('full_name') ?></div>
        <?php endif; ?>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>">
        <?php if ($validation && $validation->hasError('email')): ?>
            <div style="color:red;"><?= $validation->getError('email') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Save Customer</button>
</form>
<?= $this->endSection() ?>