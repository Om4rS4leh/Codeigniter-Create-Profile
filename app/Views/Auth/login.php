<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Sign In<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container mt-5 pt-5">
    <div class="row mt-5">
        <div class="col-4 offset-md-4">
            <h4>Sign In</h4>
            <hr>
            <form action="<?= base_url("/auth/check"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo query_result_message(session()) .
                    csrf_field() .
                    generate_input_field($validation, set_value('email'), 'email', 'Email') .
                    generate_input_field($validation, set_value('password'), 'password', 'Password', 'password');
                ?>
                <div class="form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/auth/register") ?>">Don't Have an Account? Create an Account Now!</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>