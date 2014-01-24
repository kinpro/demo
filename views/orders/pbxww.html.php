<script type="text/javascript">
    $(document).ready(function(){
        $('#country').on('change', function(){
            var countryIso = $(this).val();

            $.getJSON('index.php?controller=cities', {iso: countryIso }, function(json){
                var html = '<option value="">Select city...</option>';
                for(var i in json) {
                    var city = json[i];
                    html += '<option value="' + city.id + '">' + city.name + '</option>';
                }
                $('#city').html(html);
            });
        });
    });
</script>

<form class="form-horizontal" action="index.php" method="post" role="form">
    <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
    <input type="hidden" name="controller" value="orders">
    <input type="hidden" name="action" value="create">
    <input type="hidden" name="pbxww_form" value="1">
    <input type="hidden" name="customer_id" value="<?= $customer_id ?>">

    <div class="form-group">
        <label for="country" class="col-lg-2 control-label">Country</label>
        <div class="col-lg-3">
            <select class='form-control' name="country_iso" id="country">
                <option value="">Select country...</option>
                <?php /** @var $country Didww\API2\Country */
                foreach($countries as $iso => $country): ?>
                <option value="<?= $iso ?>" <?= ($country_iso == $iso) ? 'selected="selected"' : '' ?>><?= $country->getCountryName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="city" class="col-lg-2 control-label">City</label>
        <div class="col-lg-3">
            <select class='form-control' name="city_id" id="city">
                <option value="">Select city...</option>
                <?php /** @var $city Didww\API2\City */
                foreach($cities as $city): ?>
                    <option value="<?= $city->getCityId() ?>" <?= ($city_id == $city->getCityId()) ? 'selected="selected"' : '' ?>><?= $city->getCityName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="period" class="col-lg-2 control-label">Period</label>
        <div class="col-lg-3">
            <select class='form-control' name="period" id="period">
                <option value="1">1</option>
                <option value="3">3</option>
                <option value="6">6</option>
                <option value="12">12</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="autorenew"> Renew Automatically
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-3">
            <button type="submit" class="btn btn-primary">Create Order</button>
        </div>
    </div>
</form>
