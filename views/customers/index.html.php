<h1>Customers</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Customer ID</th>
        <th>Prepaid Balance (Points)</th>
        <th>Actions</th>
    </tr>
    <?php $i = 0;
    foreach($balances as $customer_id => $balance): ?>
        <tr>
            <td><?= ++$i ?></td>
            <td><a href="index.php?controller=orders&action=index&customer_id=<?= $customer_id ?>" title="DIDs"><?= $customer_id ?></a></td>
            <td><?= $balance ?></td>
            <td>
                <a href="index.php?controller=orders&action=add&customer_id=<?= $customer_id ?>">New Order</a><br>
                <a href="index.php?controller=balance&action=add&customer_id=<?= $customer_id ?>">Update Balance</a><br>
                <a href="index.php?controller=call_history&customer_id=<?= $customer_id ?>">Call History</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
