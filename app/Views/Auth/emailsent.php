<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row">
        <div class="col-4 offset-md-4">
            <h4>Reset Your Password</h4>
            <hr>
            <?= query_result_message(session()); ?>
            <hr>
            <a href="<?= site_url("/auth/login") ?>">Back To Home...</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>