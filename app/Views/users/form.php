<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session('errors') ?? []; ?>
<h1><?= $mode === 'edit' ? 'Edit User' : 'New User' ?></h1>
<?php if ($errors !== []): ?>
    <ul class="errors"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
<?php endif ?>
<form method="post" enctype="multipart/form-data" action="<?= $mode === 'edit' ? site_url('users/' . $user['id'] . '/edit') : site_url('users/new') ?>">
    <?= csrf_field() ?>
    <p><label for="username">Username</label><br><input id="username" name="username" type="text" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required></p>
    <p><label for="full_name">Full name</label><br><input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required></p>
    <?php if ($mode === 'edit'): ?>
        <?php $avatarUrl = ! empty($user['avatar']) ? base_url('uploads/avatars/' . $user['avatar']) : base_url('assets/images/avatar-placeholder.svg'); ?>
        <p><img class="avatar" src="<?= esc($avatarUrl) ?>" alt="Current avatar"></p>
        <p><label for="avatar">Profile picture (JPG or PNG, maximum 2MB)</label><br><input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png"></p>
    <?php endif ?>
    <p><button type="submit">Save User</button> <a href="<?= site_url('users') ?>">Cancel</a></p>
</form>
<?= $this->endSection() ?>