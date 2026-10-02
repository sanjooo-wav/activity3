<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>User Accounts</h1>
<p>User records from the database.</p>
<section class="table-wrap" aria-label="User account records">
    <table>
        <thead><tr><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created at</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['created_at']) ?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>