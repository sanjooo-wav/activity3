<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>User Accounts</h1>
<p><a href="<?= site_url('users/new') ?>">Add New User</a></p>
<section class="table-wrap" aria-label="User account records">
    <table>
        <thead><tr><th scope="col">Avatar</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created at</th><th scope="col">Action</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <?php $avatarUrl = ! empty($user['avatar']) ? base_url('uploads/avatars/' . $user['avatar']) : base_url('assets/images/avatar-placeholder.svg'); ?>
            <tr><td><img class="avatar" src="<?= esc($avatarUrl) ?>" alt="<?= esc($user['full_name']) ?> avatar"></td><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['created_at']) ?></td><td><a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>