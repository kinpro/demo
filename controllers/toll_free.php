<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class TollFreeController extends ApplicationController
{
    function index()
    {
        $toll_free = new Didww\API2\TollFree();

        $this->getView()->addJavascriptURL('/assets/javascripts/toll_free.js');
        $this->getView()->setProperties(['rates' => $toll_free->getAll()])->display();
    }

    function update()
    {
        $src_prefix = \Yoda\Request::getArray('src_prefix');
        $dst_prefix = \Yoda\Request::getArray('dst_prefix');
        $rate = \Yoda\Request::getArray('rate');
        $connect_fee = \Yoda\Request::getArray('connect_fee');
        $reject_calls = \Yoda\Request::getArray('reject_calls');

        $rates = [];

        for($i = 0; $i < count($src_prefix); $i++) {
            $rates[] = [
                'src_prefix' => $src_prefix[$i],
                'dst_prefix' => $dst_prefix[$i],
                'rate' => $rate[$i],
                'connect_fee' => $connect_fee[$i],
                'reject_calls' => $reject_calls[$i],
            ];
        }

        try {
            Didww\API2\TollFree::updateRatesFromArray($rates);

            $this->setMessage('Toll Free rates updated successfully');
        }catch(SoapFault $e){
            $this->setMessage("Error: (" . $e->faultcode . ") " . $e->faultstring, 'danger');
        }catch(Exception $e){
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=toll_free');
    }

}