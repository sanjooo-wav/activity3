<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Point of Sale System</h1>
<p>Welcome to the Point of Sale System.</p>
<p><a href="<?= site_url('customers') ?>">View Customer Accounts</a></p>
<p><a href="<?= site_url('users') ?>">View User Accounts</a></p>
<?= $this->endSection() ?>