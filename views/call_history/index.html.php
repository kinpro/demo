<h1>Call History</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Status</th>
        <th>Duration</th>
        <th>Caller ID</th>
        <th>Customer ID</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Call Date (GMT)</th>
        <th>Reason</th>
        <th>Billed (USD)</th>
        <th>Customer Billed (Points)</th>
    </tr>
    <?php $i = 0;
    /** @var $cdr Didww\API2\CDR */
    foreach($cdrs as $cdr): ?>
        <tr>
            <td><?= ++$i ?></td>
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