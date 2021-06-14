<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row">
        <div class="col-4 offset-md-4">
            <h4>Reset Your Password</h4>
            <hr>
            <form action="<?= base_url("/auth/toresetpass"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo query_result_message(session()) . csrf_field() .
                    generate_input_field($validation, set_value('newpassword'), 'newpassword', "New Password", "password") .
                    generate_input_field($validation, set_value('cnewpassword'), 'cnewpassword', "New Password Confirmation", "password", "Enter Your New Password Again");
                ?>

                <input name="resetPassCode" type="text" hidden value="<?= $resetPassCode ? $resetPassCode : set_value('resetPassCode') ?>">
                <div class=" form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/auth/login") ?>">Back To Home...</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>