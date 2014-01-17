<h1>PSTN Networks</h1>

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
    /** @var $countries Didww\API2\Country */
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
                <td><?= $network->getSellRate() ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>

