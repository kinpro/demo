<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class DIDHelper extends ApplicationHelper
{
    /**
     * @param $customer_id
     * @return array
     */
    static function getPBXwwDIDsByCustomerID($customer_id)
    {
        $balance = new Didww\API2\Balance();
        $balance->setCustomerId($customer_id);
        $orders = $balance->getBilledServices();

        $did_numbers = [];
        /** @var $order Didww\API2\Order */
        foreach($orders as $order) {
            if($order->hasPBXwwMapping() && $order->getNumber()->isActive()) {
                $did_numbers[] = $order->getNumber()->getDidNumber();
            }
        }

        return $did_numbers;
    }

}