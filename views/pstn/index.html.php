<h1>PSTN Networks</h1>

<form class="form-horizontal" action="index.php" method="post" role="form">
    <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
    <input type="hidden" name="controller" value="pstn">
    <input type="hidden" name="action" value="update">

    <button type="submit" class="btn btn-primary pull-right">Send Rates</button>
    <div class="clearfix"></div><br>

<table class="table">
    <tr>
        <th>#</th>
        <th>Country Name</th>
        <th>Country Prefix</th>
        <th>Country Iso</th>
        <th>Network Name</th>
        <th>Network Prefix</th>
        <th>Cost Rate (USD)</th>
        <th>Sell Rate (Points)</th>
    </tr>
    <?php
    $i = 0;
    /** @var $country Didww\API2\Country */
    foreach($countries as $country):
        /** @var $network Didww\API2\PSTNNetwork */
        foreach($country->getPSTNNetworks() as $network): ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $country->getCountryName() ?></td>
                <td><?= $country->getCountryPrefix() ?></td>
                <td><?= $country->getCountryIso() ?></td>
                <td><?= $network->getNetworkName() ?></td>
                <td><?= $network->getNetworkPrefix() ?></td>
                <td><?= $network->getCostRate() ?></td>
                <td><input type="text" name="sell_rate[<?= $network->getNetworkPrefix() ?>]" value="<?= $network->getSellRate() ?>" class='form-control'></td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>

</form>