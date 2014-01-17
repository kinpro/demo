<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class CallHistoryController extends ApplicationController
{
    function index()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');

        $cdr = new Didww\API2\CDRCollection();
        $cdr->setCustomerId($customer_id);
        $cdr->setLimit(10);
        $cdrs = $cdr->getList();

        $this->getView()->setProperties(['cdrs' => $cdrs])->display();
    }

}