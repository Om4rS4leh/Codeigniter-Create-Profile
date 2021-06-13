<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection('title') ?>

<?= $this->section('body') ?>

<div class="container mt-5 pt-1">
    <div class="row mt-5">

        <div class="col-4 offset-md-4">
            <h4 class="text-center"> Dashboard</h4>
            <?php
            if (!empty(session()->getFlashdata())) {
                foreach (session()->getFlashData() as $className => $message) {
                    if (in_array($className, ["success", "warning", "danger"])) {
                        echo '<div class="alert alert-' . $className . ' mt-2 py-2" role="alert">' . $message . '</div>';
                    }
                }
            }
            ?>

            <hr>
            <div>
                <table class="table table-hover table-bordered">
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
        </div>

    </div>
</div>

<?= $this->endSection('body') ?>