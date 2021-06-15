<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-7 col-md-5 col-lg-4 inner-container">
            <h4>Reset Your Password</h4>
            <hr>
            <form action="<?= base_url("/auth/sendmail"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo display_flash_messages(session()) .
                    csrf_field() .
                    generate_input_field($validation, ['value' => set_value('email'), 'name' => 'email', 'label' => 'Email']);
                ?>

                <div class="form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Find Your Account</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/auth/register") ?>">Don't Have an Account? Create an Account Now!</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>