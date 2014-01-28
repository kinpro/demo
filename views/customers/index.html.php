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
            <td><?= sprintf('%0.4f', $balance) ?></td>
            <td>
                <a href="index.php?controller=orders&action=add&customer_id=<?= $customer_id ?>">New Order</a><br>

                <?php if($customer_id != 0): ?>
                <a href="index.php?controller=balance&action=add&customer_id=<?= $customer_id ?>">Update Balance</a><br>
                <?php endif; ?>

                <a href="index.php?controller=call_history&customer_id=<?= $customer_id ?>">Call History</a><br>
                <a href="index.php?controller=sms&customer_id=<?= $customer_id ?>">SMS</a><br>
                <a href="index.php?controller=pbxww&customer_id=<?= $customer_id ?>">PBXww</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
