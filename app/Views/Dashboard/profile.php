<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Profile<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container mt-5 pt-5">
    <div class="row mt-5">
        <div class="col-4 offset-md-4">
            <h4>Profile Information</h4>
            <hr>
            <?= form_open_multipart('/dashboard/save'); ?>
            <form action="/dashboard/save" method="POST">
                <div class="mt-3">
                    <label for="avatar" class="form-label">Upload A Profile Picture</label>
                    <input class="form-control" type="file" id="avatar" name="avatar">
                </div>
                <div class="form-group mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <hr>
            <a href="<?= site_url("/dashboard") ?>">Back to Dashboard..</a>
        </div>

    </div>
</div>
<?= $this->endSection('body') ?>