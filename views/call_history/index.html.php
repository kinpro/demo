<h1>Call History</h1>

<?= $view->render('search'); ?>

<table class="table dataTable">
    <tr>
        <th>#</th>
        <?= SortingHelper::sorting('Status', 'index.php?controller=call_history', 'status', $order, $direction) ?>
        <?= SortingHelper::sorting('Duration', 'index.php?controller=call_history', 'duration', $order, $direction) ?>
        <?= SortingHelper::sorting('Caller ID', 'index.php?controller=call_history', 'caller_id', $order, $direction) ?>
        <?= SortingHelper::sorting('Customer ID', 'index.php?controller=call_history', 'customer_id', $order, $direction) ?>
        <?= SortingHelper::sorting('Source', 'index.php?controller=call_history', 'source', $order, $direction) ?>
        <?= SortingHelper::sorting('Destination', 'index.php?controller=call_history', 'destination', $order, $direction) ?>
        <?= SortingHelper::sorting('Call Date (GMT)', 'index.php?controller=call_history', 'date_gmt', $order, $direction) ?>
        <?= SortingHelper::sorting('Reason', 'index.php?controller=call_history', 'reason', $order, $direction) ?>
        <?= SortingHelper::sorting('Billed (USD)', 'index.php?controller=call_history', 'reseller_billed_usd', $order, $direction) ?>
        <?= SortingHelper::sorting('Customer Billed (Points)', 'index.php?controller=call_history', 'customer_billed_points', $order, $direction) ?>
    </tr>
    <?php
    /** @var $cdr Didww\API2\CDR */
    foreach($cdrs as $cdr): ?>
        <tr>
            <td><?= $pagination->rowOffset() ?></td>
            <td><?= $cdr->getStatus() ?></td>
            <td><?= $cdr->getDuration() ?></td>
            <td><?= $cdr->getCallerId() ?></td>
            <td><?= $cdr->getCustomerId() ?></td>
            <td><?= $cdr->getSource() ?></td>
            <td><?= $cdr->getDestination() ?></td>
            <td><?= $cdr->getDateGmt() ?></td>
            <td><?= $cdr->getReason() ?></td>
            <td><?= $cdr->getResellerBilledUsd() ?></td>
            <td><?= $cdr->getCustomerBilledPoints() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $total <= $pagination->getLimit() ? '' : $pagination->render();