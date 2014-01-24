<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class SmsController extends ApplicationController
{
    function index()
    {
        $this->getView()->addStylesheetURL('/assets/stylesheets/sorting.css');

        $customer_id = \Yoda\Request::getInt('customer_id');
        $destination = \Yoda\Request::getString('destination');
        $source = \Yoda\Request::getString('source');
        $success = \Yoda\Request::getString('success', '');
        $from_date = \Yoda\Request::getString('from_date');
        $to_date = \Yoda\Request::getString('to_date');

        $order = \Yoda\Request::getString('order', 'destination');
        $direction = \Yoda\Request::getString('direction', 'ASC');

        $pagination = new \Yoda\Pagination();
        $pagination->setLimit(10);
        $pagination->setPage(\Yoda\Request::getInt('page', 1));
        $pagination->setLink('index.php?controller=sms');

        $sms = new Didww\API2\SMSCollection();
        $sms->setCustomerId($customer_id);
        $sms->setDestination($destination);
        $sms->setSource($source);
        if($success !== '') {
            $sms->setSuccess($success);
        }
        $sms->setFromDate($from_date);
        $sms->setToDate($to_date);
        $sms->setOrderBy($order);
        $sms->setOrderDir(strtoupper($direction));

        $sms->setLimit($pagination->getLimit());
        $sms->setOffset($pagination->getOffset());

        $sms_log = $sms->getList();

        $total = $sms->getTotal();

        $pagination->setTotal($total);

        $this->getView()->setProperties([
            'view' => $this->getView(),
            'sms_log' => $sms_log,
            'customer_id' => $customer_id,
            'destination' => $destination,
            'source' => $source,
            'success' => $success,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'pagination' => $pagination,
            'order' => $order,
            'direction' => $direction,
            'total' => $total
        ])->display();
    }

}