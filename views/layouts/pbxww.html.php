<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Order DID</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <?php foreach($flash_messages as $flash): ?>
        <div class="alert alert-<?= $flash->getType() ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $flash->getMessage() ?>
        </div>
    <?php endforeach; ?>

    <?= $yield ?>

</div>

</body>
</html>
