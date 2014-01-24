<form class="form-horizontal" action="index.php" role="form">
    <input type="hidden" name="controller" value="<?= $controller ?>">

    <div class="form-group">
        <label for="customer_id" class="col-lg-2 control-label">Customer ID</label>
        <div class="col-lg-3">
            <input type="text" name="customer_id" id="customer_id" value="<?= $customer_id ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="destination" class="col-lg-2 control-label">Destination</label>
        <div class="col-lg-3">
            <input type="text" name="destination" id="destination" value="<?= $destination ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="source" class="col-lg-2 control-label">Source</label>
        <div class="col-lg-3">
            <input type="text" name="source" id="source" value="<?= $source ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="success" class="col-lg-2 control-label">Success</label>
        <div class="col-lg-3">
            <select name="success" id="success" class='form-control'>
                <option value="">Select Success ...</option>
                <option value="1" <?= $success == '1' ? 'selected="selected"' : '' ?>>Yes</option>
                <option value="0" <?= $success === '0' ? 'selected="selected"' : '' ?>>No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="from_date" class="col-lg-2 control-label">From Date</label>
        <div class="col-lg-3">
            <input type="text" name="from_date" id="from_date" value="<?= $from_date ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="to_date" class="col-lg-2 control-label">To Date</label>
        <div class="col-lg-3">
            <input type="text" name="to_date" id="to_date" value="<?= $to_date ?>" class='form-control'>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>