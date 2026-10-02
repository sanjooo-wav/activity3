<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session('errors') ?? []; ?>
<h1><?= $mode === 'edit' ? 'Edit Customer' : 'New Customer' ?></h1>
<?php if ($errors !== []): ?>
    <ul class="errors"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
<?php endif ?>
<form method="post" action="<?= $mode === 'edit' ? site_url('customers/' . $customer['id'] . '/edit') : site_url('customers/new') ?>">
    <?= csrf_field() ?>
    <p><label for="full_name">Full name</label><br><input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required></p>
    <p><label for="email">Email</label><br><input id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required></p>
    <p><label for="phone">Phone</label><br><input id="phone" name="phone" type="text" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"></p>
    <p><button type="submit">Save Customer</button> <a href="<?= site_url('customers') ?>">Cancel</a></p>
</form>
<?= $this->endSection() ?>