<h1>API Details</h1>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">API Version</div>
            <div class="panel-body">
                <?= $details->getApiVersion() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">DID Pricelist</div>
            <div class="panel-body">
                <?= $details->getResellerDidPricelist() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">PSTN Tariff</div>
            <div class="panel-body">
                <?= $details->getResellerPstnTariff() ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">Balance</div>
            <div class="panel-body">
                <?= $details->getResellerBalance() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">Balance Status</div>
            <div class="panel-body">
                <?= $details->getResellerBalanceStatus() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">Reseller ID</div>
            <div class="panel-body">
                <?= $details->getResellerId() ?>
            </div>
        </div>
    </div>
</div>



