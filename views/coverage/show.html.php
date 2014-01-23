<h1>Coverage</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>City ID</th>
        <th>City Name</th>
        <th>Prefix</th>
        <th>NxxPrefix</th>
        <th>Setup Price</th>
        <th>Monthly Price</th>
        <th>Is Available</th>
        <th>Is LNR Required</th>
        <th>Actions</th>
    </tr>
    <?php $i = 0;
    /** @var $city Didww\API2\City */
    foreach($cities as $city): ?>
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $city->getCityId() ?></td>
            <td><?= $city->getCityName() ?></td>
            <td><?= $city->getCityPrefix() ?></td>
            <td><?= $city->getCityNxxPrefix() ?></td>
            <td><?= $city->getSetup() ?></td>
            <td><?= $city->getMonthly() ?></td>
            <td><?= $city->getIsavailable() ? 'Yes' : 'No' ?></td>
            <td><?= $city->getIslnrrequired() ? 'Yes' : 'No' ?></td>
            <td><a href="index.php?controller=orders&action=add&country_iso=<?= $city->getCountry()->getCountryIso() ?>&city_id=<?= $city->getCityId() ?>">New Order</a></td>
        </tr>
    <?php endforeach; ?>
</table>

