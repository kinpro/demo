<h1>Call History Invoices</h1>

<?= $view->render('search'); ?>

<b>Customer ID:</b>
<p>
    <?= $invoice->getCustomerId() ?>
</p>
<b>From Date:</b>
<p>
    <?= $invoice->getFromDate() ?>
</p>
<b>To Date:</b>
<p>
    <?= $invoice->getToDate() ?>
</p>
<b>Amount:</b>
<p>
    <?= $invoice->getAmount() ?>
</p>
<b>Reseller Amount:</b>
<p>
    <?= $invoice->getResellerAmount() ?>
</p>
