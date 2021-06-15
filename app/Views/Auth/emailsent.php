<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-7 col-md-5 col-lg-4 inner-container">
            <h4>Reset Your Password</h4>
            <hr>
            <?= display_flash_messages(session()); ?>
            <hr>
            <a href="<?= site_url("/auth/login") ?>">Back To Home...</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>