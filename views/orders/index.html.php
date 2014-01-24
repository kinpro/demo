<h1>Orders</h1>

<a href="index.php?controller=orders&action=add&customer_id=<?= $customer_id ?>" class="btn btn-primary">New Order</a><br><br>

<?php if(count($dids) == 0): ?>
    No Data
<?php else: ?>

<table class="table">
    <tr>
        <th>#</th>
        <th>DID</th>
        <th>Country</th>
        <th>City</th>
        <th>DID Status</th>
        <th>DID Expire Date</th>
        <th>Order ID</th>
        <th>Order Status</th>
        <th>Mapping</th>
        <th>Setup Price (USD)</th>
        <th>Monthly Price (USD)</th>
        <th>Period</th>
        <th>Actions</th>
    </tr>
    <?php $i = 0;
    /** @var $did Didww\API2\DIDNumber */
    foreach($dids as $did): ?>
    <form class="form-horizontal" action="index.php" method="post" role="form">
        <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
        <input type="hidden" name="controller" value="orders">
        <input type="hidden" name="action" value="renew">
        <input type="hidden" name="did_number" value="<?= $did->getDidNumber() ?>">
        <input type="hidden" name="customer_id" value="<?= $customer_id ?>">
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $did->getDidNumber() ?></td>
            <td><?= $did->getCountryName() ?></td>
            <td><?= $did->getCityName() ?></td>
            <td><?= $did->getDidStatus() ?></td>
            <td><?= $did->getDidExpireDateGmt() ?></td>
            <td><?= $did->getOrderId() ?></td>
            <td><?= $did->getOrderStatus() ?></td>
            <td><?= $did->getDidMappingFormat() ?></td>
            <td><?= $did->getDidSetup() ?></td>
            <td><?= $did->getDidMonthly() ?></td>
            <td>
                <select class='form-control' name="period" id="period" style="width: 70px">
                    <option value="1" <?= $did->getDidPeriod() == 1 ? 'selected="selected"' : '' ?>>1</option>
                    <option value="3" <?= $did->getDidPeriod() == 3 ? 'selected="selected"' : '' ?>>3</option>
                    <option value="6" <?= $did->getDidPeriod() == 6 ? 'selected="selected"' : '' ?>>6</option>
                    <option value="12" <?= $did->getDidPeriod() == 12 ? 'selected="selected"' : '' ?>>12</option>
                </select>
            </td>
            <td nowrap>
                <button type="submit" class="btn btn-primary">Renew</button><br>
                <a href="index.php?controller=mapping&action=add&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Update Mapping</a><br>
                <a href="index.php?controller=call_history&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Call History</a><br>
                <?php if($did->getDidStatus() == 1): ?>
                    <a href="index.php?controller=orders&action=cancel&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Cancel</a>
                <?php else : if($did->getDidStatus() == -1): ?>
                    <a href="index.php?controller=orders&action=restore&did_number=<?= $did->getDidNumber() ?>&customer_id=<?= $customer_id ?>">Restore</a>
                <?php endif; endif; ?>
            </td>
        </tr>
    </form>
    <?php endforeach; ?>
</table>

<?php endif;