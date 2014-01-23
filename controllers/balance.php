<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class BalanceController extends ApplicationController
{
    function index()
    {
        $this->redirect('index.php?controller=balance&action=add');
    }

    function add()
    {
        $this->getView()->setProperties(['customer_id' => \Yoda\Request::getInt('customer_id')])->display();
    }

    function update()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $amount = \Yoda\Request::getFloat('amount');

        try {
            $balance = new Didww\API2\Balance();
            $balance->setCustomerId($customer_id);
            $balance->changeBalance($amount);

            $this->setMessage($amount . ' points was added to customer ID #' . $customer_id);
        } catch(SoapFault $e) {
            $this->setMessage("Error: (" . $e->faultcode . ") " . $e->faultstring, 'danger');
            $this->redirect('index.php?controller=balance&action=add');
        } catch(Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
            $this->redirect('index.php?controller=balance&action=add');
        }

        $this->redirect('index.php?controller=customers');
    }

}