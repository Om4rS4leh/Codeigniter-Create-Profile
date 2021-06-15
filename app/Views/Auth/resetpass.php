<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Reset Password<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-7 col-md-5 col-lg-4 inner-container">
            <h4>Reset Your Password</h4>
            <hr>
            <form action="<?= base_url("/auth/toresetpass"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo display_flash_messages(session()) . csrf_field() .
                    generate_input_field($validation, ['value' => set_value('newpassword'), 'name' => 'newpassword', 'label' => "New Password"]) .
                    generate_input_field($validation, ['value' => set_value('cnewpassword'), 'name' => 'cnewpassword', 'label' => "New Password Confirmation", 'placeholder' => "Enter Your New Password Again"]);
                ?>

                <input name="resetPassCode" type="text" hidden value="<?= isset($resetPassCode) ? $resetPassCode  : set_value('resetPassCode') ?>">
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