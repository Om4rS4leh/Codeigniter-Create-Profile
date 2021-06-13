<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Sign Up<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container mt-5 pt-1">
    <div class="row mt-5">

        <div class="col-4 offset-md-4">
            <h4> Sign Up</h4>
            <hr>
            <form action="<?= base_url("auth/save"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo query_result_message(session()) .
                    csrf_field() .
                    generate_input_field($validation, set_value('name'), 'name', 'Name') .
                    generate_input_field($validation, set_value('email'), 'email', 'Email') .
                    generate_input_field($validation, set_value('password'), 'password', 'Password', 'password') .
                    generate_input_field($validation, set_value('cpassword'), 'cpassword', 'Password Confirmation', 'password', "Enter Your Password Again...");
                ?>

                <div class=" form-group mt-4 d-grid gap-2">
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/auth/login"); ?>">I Already Have An Account..</a>
        </div>

    </div>
</div>

<?= $this->endSection('body') ?>