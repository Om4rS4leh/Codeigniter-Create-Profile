<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-8 col-lg-6 inner-container">
            <h4 class="text-center"> Dashboard</h4>

            <?= display_flash_messages(session()); ?>

            <hr>
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                <div class="btn-sm btn"><?= ucfirst($user['name']) ?></div>
                            </td>
                            <td>
                                <div class="btn btn-sm"><?= $user['email'] ?></div>
                            </td>
                            <td>
                                <div class="text-center"><a href="<?= site_url('/auth/logout'); ?>" class="btn btn-danger btn-sm"> Log Out</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?= site_url("/dashboard/profile") ?>">Edit Your Profile</a>
        </div>

    </div>
</div>

<?= $this->endSection('body') ?>