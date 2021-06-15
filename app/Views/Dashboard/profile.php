<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Profile<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('/Assets/CSS/profile.css') ?>" rel="stylesheet">
<?= $this->endSection() ?>


<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-7 col-md-6 col-lg-5 inner-container">
            <h4>Profile Information</h4>
            <hr>
            <?= form_open_multipart('/dashboard/save'); ?>
            <form action="/dashboard/save" method="POST">

                <?= display_flash_messages(session()); ?>
                <div class="form-group">
                    <div class="avatar-upload">
                        <input type='radio' id="imageUploaded" name="isImageUploaded" hidden />
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload">
                                <i class="imageUpload-label fas fa-pencil-alt"></i>
                            </label>
                        </div>
                        <div class="avatar-preview">
                            <?php
                            $placeholderImage = isset($user['avatar']) ? base_url("/media/avatars/" . $user['avatar']) : base_url("Assets/images/user-avatar.png");
                            ?>
                            <div id="imagePreview" style="background-image: url(<?= $placeholderImage; ?>);">
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $emailValue = isset($user['email']) ? $user['email'] : set_value('email');
                $nameValue = isset($user['name']) ? $user['name'] : set_value('name');
                $validation = isset($validation) ? $validation : false;
                echo
                generate_input_field($validation, ['value' => $emailValue, 'name' => 'email', 'label' => 'Email']) .
                    generate_input_field($validation, ['value' => $nameValue, 'name' => 'name', 'label' => 'Name']) .
                    generate_input_field($validation, ['value' => set_value('password'), 'name' => 'password', 'label' => 'Password']);
                ?>

                <?php $idValue = isset($user['id']) ? $user['id'] : set_value('id'); ?>
                <input type="text" name="id" value="<?= $idValue ?>" hidden>

                <div class=" form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <hr>
                <div class=" form-group my-3 d-grid gap-2">
                    <a class="btn btn-danger" href="<?= site_url("/dashboard/password") ?>">Change The Password</a>
                </div>
            </form>

            <a href="<?= site_url("/dashboard") ?>">Back to Dashboard..</a>
        </div>

    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        $("#imageUploaded").prop('checked', true);
        readURL(this);
    });
</script>

<?= $this->endSection() ?>