<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon" />

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/stylesheets/whhg.css">
    <link href="/assets/stylesheets/style.css" rel="stylesheet" />
</head>
<body>
<div class="container">

    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">DIDWW Demo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= $controller == 'default' ? 'active' : '' ?>"><a href="index.php">Dashboard</a></li>
                <li class="<?= $controller == 'balance' ? 'active' : '' ?>"><a href="index.php?controller=balance">Balance</a></li>
                <li class="<?= $controller == 'mapping' ? 'active' : '' ?>"><a href="index.php?controller=mapping">Mapping</a></li>
                <li class="<?= $controller == 'customers' ? 'active' : '' ?>"><a href="index.php?controller=customers">Customers</a></li>
                <li class="<?= $controller == 'coverage' ? 'active' : '' ?>"><a href="index.php?controller=coverage">Coverage</a></li>
                <li class="<?= $controller == 'call_history' ? 'active' : '' ?>"><a href="index.php?controller=call_history">Call History</a></li>
                <li class="<?= $controller == 'pstn' ? 'active' : '' ?>"><a href="index.php?controller=pstn">PSTN</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['username'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?controller=authorize&action=sign_out"><i class="icon-off"></i> Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <?= isset($breadcrumbs) ? $breadcrumbs : ''; ?>

    <?php foreach($flash_messages as $flash): ?>
    <div class="alert alert-<?= $flash->getType() ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $flash->getMessage() ?>
    </div>
    <?php endforeach; ?>

    <?= $yield ?>

    <div id="push"><!--//--></div>
</div>
<footer>
    <div class="container">
        <span>&copy; 2014 DIDWW Demo Panel</span>
    </div>
</footer>

</body>
</html>
