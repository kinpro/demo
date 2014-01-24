<h1>SMS Log</h1>

<?= $view->render('search'); ?>

<table class="table dataTable">
    <tr>
        <th>#</th>
        <?= SortingHelper::sorting('Is Success', 'index.php?controller=sms', 'success', $order, $direction) ?>
        <?= SortingHelper::sorting('Customer ID', 'index.php?controller=sms', 'customer_id', $order, $direction) ?>
        <?= SortingHelper::sorting('Destination', 'index.php?controller=sms', 'destination', $order, $direction) ?>
        <?= SortingHelper::sorting('Source', 'index.php?controller=sms', 'source', $order, $direction) ?>
        <?= SortingHelper::sorting('SMS Date (GMT)', 'index.php?controller=sms', 'date_gmt', $order, $direction) ?>
        <?= SortingHelper::sorting('Reason', 'index.php?controller=sms', 'reason', $order, $direction) ?>
        <?= SortingHelper::sorting('Billed (USD)', 'index.php?controller=sms', 'reseller_billed_usd', $order, $direction) ?>
        <?= SortingHelper::sorting('Customer Billed (Points)', 'index.php?controller=sms', 'customer_billed_points', $order, $direction) ?>
    </tr>
    <?php
    /** @var $sms Didww\API2\SMS */
    foreach($sms_log as $sms): ?>
        <tr>
            <td><?= $pagination->rowOffset() ?></td>
            <td><?= $sms->getSuccess() ? 'Yes' : 'No' ?></td>
            <td><?= $sms->getCustomerId() ?></td>
            <td><?= $sms->getDestination() ?></td>
            <td><?= $sms->getSource() ?></td>
            <td><?= $sms->getDateGmt() ?></td>
            <td><?= $sms->getReason() ?></td>
            <td><?= $sms->getResellerBilledUsd() ?></td>
            <td><?= $sms->getCustomerBilledPoints() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $total <= $pagination->getLimit() ? '' : $pagination->render();