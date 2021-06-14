<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title"); ?></title>
    <link rel="stylesheet" href="<?= base_url("/Libraries/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/Libraries/fontawesome/css/all.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/Assets/CSS/main.css") ?>">
    <?= $this->renderSection("head"); ?>
</head>

<body>

    <?= $this->renderSection("body"); ?>

    <script src="<?= base_url('/libraries/jquery.min.js') ?>"></script>
    <?= $this->renderSection("scripts"); ?>
</body>

</html>