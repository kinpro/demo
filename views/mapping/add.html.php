<form class="form-horizontal" action="index.php" method="post" role="form">
    <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
    <input type="hidden" name="controller" value="<?= $controller ?>">
    <input type="hidden" name="action" value="update">

    <div class="form-group">
        <label for="did" class="col-lg-2 control-label">DID</label>
        <div class="col-lg-3">
            <input type="text" name="did_number" id="did" value="<?= $did ?>" class='form-control'>
        </div>
    </div>

    <div class="form-group">
        <label for="customer_id" class="col-lg-2 control-label">Customer ID</label>
        <div class="col-lg-3">
            <input type="text" name="customer_id" id="customer_id" value="<?= $customer_id ?>" class='form-control'>
        </div>
    </div>

    <?php include __DIR__ . '/../mapping/_form.html.php'; ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
