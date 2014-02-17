<script src="/assets/javascripts/mapping.js"></script>

<div class="form-group">
    <label for="map_type" class="col-lg-2 control-label">Map Type</label>
    <div class="col-lg-3">
        <select name="map_type" id="map_type" class='form-control' required>
            <option value="">Select Map Type ...</option>
            <option value="gtalk">Google Talk</option>
            <option value="pstn">PSTN</option>
            <option value="voip">VOIP</option>
            <option value="pbxww">PBXww</option>
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