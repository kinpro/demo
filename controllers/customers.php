<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class CustomersController extends ApplicationController
{

    function index()
    {
        $balances = Didww\API2\Balance::getBalanceArray();

        $this->getView()->setProperties(['balances' => $balances])->display();
    }

}