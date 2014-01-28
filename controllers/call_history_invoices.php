<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class CallHistoryInvoicesController extends ApplicationController
{
    function index()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $from_date = \Yoda\Request::getString('from_date');
        $to_date = \Yoda\Request::getString('to_date');

        $invoice = new Didww\API2\CDRInvoice();
        $invoice->setCustomerId($customer_id);
        $invoice->setFromDate($from_date);
        $invoice->setToDate($to_date);
        $invoice->load();

        $this->getView()->setProperties([
            'view' => $this->getView(),
            'invoice' => $invoice,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'customer_id' => $customer_id
        ])->display();
    }

}