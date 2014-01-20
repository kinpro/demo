<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class PstnController extends ApplicationController
{
    function index()
    {
        $pstn = new Didww\API2\PSTNNetwork();

        $this->getView()->setProperties(['countries' => $pstn->getAll()])->display();
    }

    function update()
    {
        $sell_rates = \Yoda\Request::getArray('sell_rate');

        $rates = [];
        foreach($sell_rates as $network_prefix => $sell_rate) {
            $rates[] = ['network_prefix' => trim($network_prefix), 'sell_rate' => $sell_rate];
        }

        try {
            Didww\API2\PSTNNetwork::updateNetworksFromArray($rates);

            $this->setMessage('PSTN rates updated successfully');
        }catch(SoapFault $e){
            $this->setMessage("Error: (" . $e->faultcode . ") " . $e->faultstring, 'danger');
        }catch(Exception $e){
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=pstn');
    }

}