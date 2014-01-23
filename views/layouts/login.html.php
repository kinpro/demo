<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- General Metas -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">        <!-- Force Latest IE rendering engine -->
    <title>DIDWW Demo | Login Page</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/stylesheets/login/base.css">
    <link rel="stylesheet" href="/assets/stylesheets/login/skeleton.css">
    <link rel="stylesheet" href="/assets/stylesheets/login/layout.css">

</head>
<body>

<?php if(count($flash_messages) > 0) : ?>
    <div class="notice">
        <a href="index.php?controller=authorize" class="close">close</a>
        <p class="warn"><?php echo end($flash_messages); ?></p>
    </div>
<?php endif; ?>


<!-- Primary Page Layout -->

<div class="container">

    <div class="form-bg">
        <form method="post" action="index.php">

            <input type="hidden" name="authenticity_token" value="<?= $_SESSION['authenticity_token'] ?>">
            <input type="hidden" name="controller" value="authorize">
            <input type="hidden" name="action" value="login">

            <h2>Login To DIDWW Demo Panel</h2>
            <p><input type="text" placeholder="Username" name="username"></p>
            <p style="margin-bottom: 10px"><input type="password" placeholder="API Key" name="password"></p>
            <div style="text-align: right; padding-right: 30px; padding-bottom: 10px"><input type="checkbox" name="test_mode" id="mode"><label for="mode" style="margin-left: 10px"><span id="mode_mark">Test Mode</span></label></div>
            <button type="submit">Login</button>
        </form>
    </div>

</div><!-- container -->

<!-- End Document -->
</body>
</html>