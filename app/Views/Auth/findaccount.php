<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row">
        <div class="col-4 offset-md-4">
            <h4>Reset Your Password</h4>
            <hr>
            <form action="<?= base_url("/auth/sendmail"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo query_result_message(session()) .
                    csrf_field() .
                    generate_input_field($validation, set_value('email'), 'email', 'Email');
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