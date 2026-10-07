<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h2>Customer Accounts Listing</h2>

<?php if (session()->get('isLoggedIn')): ?>

    <div class="mb-3 p-2 bg-light border d-flex justify-content-between align-items-center">

        <span>
            Logged in as:
            <strong><?= esc(session()->get('username')) ?></strong>
        </span>

        <a
            href="<?= base_url('index.php/logout') ?>"
            class="btn btn-outline-danger btn-sm"
        >
            Logout
        </a>

    </div>

<?php endif; ?>


<?php if (session()->getFlashdata('message')): ?>

    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('message')) ?>
    </div>

<?php endif; ?>


<a
    href="<?= base_url('index.php/customers/new') ?>"
    class="btn btn-primary mb-3"
>
    + Add New Customer
</a>


<table border="1" cellpadding="8" cellspacing="0" width="100%">

    <thead>

        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

    </thead>

    <tbody>

        <?php if (!empty($customers)): ?>

            <?php foreach ($customers as $customer): ?>

                <tr>

                    <td>
                        <?= esc($customer['full_name']) ?>
                    </td>

                    <td>
                        <?= esc($customer['email']) ?>
                    </td>

                    <td>

                        <a
                            href="<?= base_url('index.php/customers/edit/' . $customer['id']) ?>"
                        >
                            Edit
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="3">
                    No customers found.
                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>

<?= $this->endSection() ?>