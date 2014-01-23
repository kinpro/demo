<h1>Toll Free</h1>

<form class="form-horizontal" action="index.php" method="post" role="form">
    <input type="hidden" name="authenticity_token" value="<?= $authenticity_token ?>">
    <input type="hidden" name="controller" value="toll_free">
    <input type="hidden" name="action" value="update">

    <button type="submit" class="btn btn-primary pull-right">Send Rates</button>
    <div class="clearfix"></div><br>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Src Prefix</th>
            <th>Dst Prefix</th>
            <th>Rate (USD)</th>
            <th>Connect Fee (USD)</th>
            <th>Reject Calls</th>
            <th></th>
        </tr>
        <?php
        $i = 0;
        foreach($rates as $rate): ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><input type="text" name="src_prefix[]" value="<?= $rate->src_prefix ?>" class='form-control'></td>
                <td><input type="text" name="dst_prefix[]" value="<?= $rate->dst_prefix ?>" class='form-control'></td>
                <td><input type="text" name="rate[]" value="<?= sprintf('%0.4f', $rate->rate) ?>" class='form-control'></td>
                <td><input type="text" name="connect_fee[]" value="<?= sprintf('%0.4f', $rate->connect_fee) ?>" class='form-control'></td>
                <td><input type="text" name="reject_calls[]" value="<?= $rate->reject_calls ?>" class='form-control'></td>
                <td><button type="button" class="btn btn-danger">Remove</button></td>
            </tr>
        <?php endforeach; ?>
    </table>

</form>

<button type="button" class="btn pull-right" id="addRow">Add New</button>