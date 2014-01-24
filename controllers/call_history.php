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
        $this->getView()->addStylesheetURL('/assets/stylesheets/sorting.css');

        $customer_id = \Yoda\Request::getInt('customer_id');
        $did_number = \Yoda\Request::getString('did_number');
        $from_date = \Yoda\Request::getString('from_date');
        $to_date = \Yoda\Request::getString('to_date');

        $order = \Yoda\Request::getString('order', 'duration');
        $direction = \Yoda\Request::getString('direction', 'ASC');

        $pagination = new \Yoda\Pagination();
        $pagination->setLimit(10);
        $pagination->setPage(\Yoda\Request::getInt('page', 1));
        $pagination->setLink('index.php?controller=call_history&did_number=' . $did_number . '&customer_id=' . $customer_id . '&from_date=' . $from_date . '&to_date=' . $to_date);

        $cdr = new Didww\API2\CDRCollection();
        $cdr->setCustomerId($customer_id);
        $cdr->setDidNumber($did_number);
        $cdr->setFromDate($from_date);
        $cdr->setToDate($to_date);
        $cdr->setOrderBy($order);
        $cdr->setOrderDir(strtoupper($direction));

        $cdr->setLimit($pagination->getLimit());
        $cdr->setOffset($pagination->getOffset());

        $cdrs = $cdr->getList();

        $total = $cdr->getTotal();

        $pagination->setTotal($total);

        $this->getView()->setProperties([
            'view' => $this->getView(),
            'cdrs' => $cdrs,
            'customer_id' => $customer_id,
            'did_number' => $did_number,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'pagination' => $pagination,
            'order' => $order,
            'direction' => $direction,
            'total' => $total
        ])->display();
    }

}