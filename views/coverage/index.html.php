<h1>Coverage</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Country</th>
        <th>Prefix</th>
        <th>Iso</th>
        <th>Actions</th>
    </tr>
    <?php $i = 0;
    /** @var $country Didww\API2\Country */
    foreach($countries as $country): ?>
        <tr>
            <td><?= ++$i ?></td>
            <td><a href="index.php?controller=coverage&action=show&iso=<?= $country->getCountryIso() ?>" title="Cities"><?= $country->getCountryName() ?></a></td>
            <td><?= $country->getCountryPrefix() ?></td>
            <td><?= $country->getCountryIso() ?></td>
            <td><a href="index.php?controller=orders&action=add&country_iso=<?= $country->getCountryIso() ?>">New Order</a></td>
        </tr>
    <?php endforeach; ?>
</table>
