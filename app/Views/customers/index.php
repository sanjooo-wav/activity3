<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Customer Accounts</h1>
<p>Customer records from the database.</p>
<section class="table-wrap" aria-label="Customer account records">
    <table>
        <thead><tr><th scope="col">Full name</th><th scope="col">Email</th><th scope="col">Phone</th></tr></thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr><td><?= esc($customer['full_name']) ?></td><td><a href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td><td><?= esc($customer['phone']) ?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>