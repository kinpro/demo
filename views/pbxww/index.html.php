<form class="form-horizontal" action="index.php" method="post" role="form" target="_blank">
    <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
    <input type="hidden" name="controller" value="<?= $controller ?>">
    <input type="hidden" name="action" value="panel">

    <div class="form-group">
        <label for="customer_id" class="col-lg-2 control-label">Customer ID</label>
        <div class="col-lg-3">
            <input type="text" name="customer_id" id="customer_id" value="<?= $customer_id ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="timezone" class="col-lg-2 control-label">Timezone</label>
        <div class="col-lg-3">
            <input type="text" name="timezone" id="timezone" value="<?= $timezone ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="language" class="col-lg-2 control-label">Language</label>
        <div class="col-lg-3">
            <select name="language" id="language" class='form-control' required>
                <option value="">Select Language ...</option>
                <option value="en-GB" <?= ($language == 'en-GB') ? 'selected="selected"' : '' ?>>English</option>
                <option value="ru-RU" <?= ($language == 'ru-RU') ? 'selected="selected"' : '' ?>>Russian</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="site_name" class="col-lg-2 control-label">Site Name</label>
        <div class="col-lg-3">
            <input type="text" name="site_name" id="site_name" value="<?= $site_name ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="site_url" class="col-lg-2 control-label">Site URL</label>
        <div class="col-lg-3">
            <input type="text" name="site_url" id="site_url" value="<?= $site_url ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="help_url" class="col-lg-2 control-label">Help URL</label>
        <div class="col-lg-3">
            <input type="text" name="help_url" id="help_url" value="<?= $help_url ?>" class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label for="support_url" class="col-lg-2 control-label">Support URL</label>
        <div class="col-lg-3">
            <input type="text" name="support_url" id="support_url" value="<?= $support_url ?>" class='form-control'>
        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-3">
            <button type="submit" class="btn btn-primary">Launch PBXww Panel</button>
        </div>
    </div>
</form>
