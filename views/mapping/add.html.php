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

    <div class="form-group">
        <label for="map_type" class="col-lg-2 control-label">Map Type</label>
        <div class="col-lg-3">
            <select name="map_type" id="map_type" class='form-control' required>
                <option value="">Select Map Type ...</option>
                <option value="gtalk">Google Talk</option>
                <option value="pstn">PSTN</option>
                <option value="voip">VOIP</option>
            </select>
        </div>
    </div>

    <div style="display: none" id="voip_form">
        <div class="form-group">
            <label for="map_type" class="col-lg-2 control-label">Map Proto</label>
            <div class="col-lg-3">
                <select name="map_proto" id="map_proto" class='form-control'>
                    <option value="">Select Map Proto ...</option>
                    <option value="sip">SIP</option>
                    <option value="h323">H323</option>
                    <option value="iax">IAX</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="host" class="col-lg-2 control-label">Host</label>
            <div class="col-lg-3">
                <input type="text" name="host" id="host" class='form-control'>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="map_details" class="col-lg-2 control-label">Map Details</label>
        <div class="col-lg-3">
            <input type="text" name="map_details" id="map_details" class='form-control'>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
