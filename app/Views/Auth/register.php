<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Sign Up<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-7 col-md-6 col-lg-5 inner-container">
            <h4> Sign Up</h4>
            <hr>
            <form action="<?= base_url("auth/save"); ?>" method="POST">
                <?php
                $validation = isset($validation) ? $validation : false;
                echo display_flash_messages(session()) .
                    csrf_field() .
                    generate_input_field($validation, ['value' => set_value('name'), 'name' => 'name', 'label' => 'Name']) .
                    generate_input_field($validation, ['value' => set_value('email'), 'name' => 'email', 'label' => 'Email']) .
                    generate_input_field($validation, ['value' => set_value('password'), 'name' => 'password', 'label' => 'Password']) .
                    generate_input_field($validation, ['value' => set_value('cpassword'), 'name' => 'cpassword', 'label' => 'Password Confirmation', 'placeholder' => "Enter Your Password Again..."]);
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