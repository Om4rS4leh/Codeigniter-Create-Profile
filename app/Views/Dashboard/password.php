<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Change Password<?= $this->endSection() ?>


<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row">
        <div class="col-4 offset-md-4">
            <h4>Change Password</h4>
            <hr>
            <form action="/dashboard/savepassword" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo query_result_message(session()) .
                    generate_input_field($validation, set_value('password'), 'password', 'Old Password', 'password') .
                    '<hr>' .
                    generate_input_field($validation, set_value('newpassword'), 'newpassword', "New Password", "password") .
                    generate_input_field($validation, set_value('cnewpassword'), 'cnewpassword', "New Password Confirmation", "password", "Enter Your New Password Again");
                ?>
                <div class=" form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/dashboard") ?>">Back to Dashboard..</a>
        </div>

    </div>
</div>


<?= $this->endSection() ?>