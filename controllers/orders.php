<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class OrdersController extends ApplicationController
{
    function index()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');

        $b = new Didww\API2\Balance();
        $b->setCustomerId($customer_id);
        $dids = $b->getBilledServices();

        $this->getView()->setProperties(['dids' => $dids, 'customer_id' => $customer_id])->display();
    }

    function add()
    {
        $countryIso = \Yoda\Request::getString('country_iso');
        $customer_id = \Yoda\Request::getInt('customer_id');
        $city_id = \Yoda\Request::getInt('city_id');
        $pbxwwForm = \Yoda\Request::getInt('pbxww_form');

        if($pbxwwForm) {
            $this->layout = 'pbxww';
        }

        $cities = [];
        if($countryIso) {
            $country = new Didww\API2\Country();
            $country->setCountryIso($countryIso);
            $country->loadCities();

            $cities = $country->getCities();
        }

        $this->getView()->setProperties([
            'customer_id' => $customer_id,
            'country_iso' => $countryIso,
            'city_id' => $city_id,
            'countries' => Didww\API2\Country::getAll(),
            'cities' => $cities,
            'pbxww_form' => $pbxwwForm
        ])->display($pbxwwForm ? 'pbxww' : 'add');
    }

    function create()
    {
        $countryIso = \Yoda\Request::getString('country_iso');
        $customer_id = \Yoda\Request::getInt('customer_id');
        $city_id = \Yoda\Request::getInt('city_id');
        $period = \Yoda\Request::getInt('period');
        $autorenew = \Yoda\Request::getBool('autorenew');
        $pbxwwForm = \Yoda\Request::getInt('pbxww_form');

        $order = new Didww\API2\Order();
        $order->setCustomerId($customer_id);
        $order->setCountryIso($countryIso);
        $order->setPeriod($period);

        $mapping = new Didww\API2\Mapping\PBXww(); // default mapping PBXww
        $order->setMapData($mapping);
        $order->setCityId($city_id);
        $order->setAutorenewEnable($autorenew);

        try{
            $did_number = $order->createNumber();
            $this->setMessage('DID #' . $did_number->getNumber() . ' was purchased successfully');
        }catch (SoapFault $e) {
            $this->setMessage('Error: (' . $e->faultcode . ') ' . $e->faultstring, 'danger');
        }

        $this->redirect($pbxwwForm ? 'index.php?controller=orders&action=add&customer_id=' . $customer_id . '&pbxww_form=1' : 'index.php?controller=customers');
    }

    function renew()
    {
        $did_number = \Yoda\Request::getString('did_number');
        $customer_id = \Yoda\Request::getInt('customer_id');
        $period = \Yoda\Request::getInt('period', 1);

        try{
            $order = new Didww\API2\Order();
            $order->setCustomerId($customer_id);
            $order->setPeriod($period);

            $did = new Didww\API2\DIDNumber();
            $did->setDidNumber($did_number);
            $did->setOrder($order);
            $did->renew();

            $this->setMessage('DID #' . $did->getDidNumber() . ' was renewed successfully');
        }catch (SoapFault $e) {
            $this->setMessage('Error: (' . $e->faultcode . ') ' . $e->faultstring, 'danger');
        }catch (Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=orders&customer_id=' . $customer_id);
    }

    function restore()
    {
        $did_number = \Yoda\Request::getString('did_number');
        $customer_id = \Yoda\Request::getInt('customer_id');

        try{
            $order = new Didww\API2\Order();
            $order->setCustomerId($customer_id);
            $order->setPeriod(1);
            $order->setAutorenewEnable(false);

            $did = new Didww\API2\DIDNumber();
            $did->setDidNumber($did_number);
            $did->setOrder($order);
            $did->restore();

            $this->setMessage('DID #' . $did->getDidNumber() . ' was restored successfully');
        }catch (SoapFault $e) {
            $this->setMessage('Error: (' . $e->faultcode . ') ' . $e->faultstring, 'danger');
        }catch (Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=orders&customer_id=' . $customer_id);
    }

    function cancel()
    {
        $did_number = \Yoda\Request::getString('did_number');
        $customer_id = \Yoda\Request::getInt('customer_id');

        try{
            $order = new Didww\API2\Order();
            $order->setCustomerId($customer_id);

            $did = new Didww\API2\DIDNumber();
            $did->setDidNumber($did_number);
            $did->setOrder($order);
            $did->cancel();

            $this->setMessage('DID #' . $did->getDidNumber() . ' was cancelled successfully');
        }catch (SoapFault $e) {
            $this->setMessage('Error: (' . $e->faultcode . ') ' . $e->faultstring, 'danger');
        }catch (Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=orders&customer_id=' . $customer_id);
    }

    function autorenew()
    {
        $did_number = \Yoda\Request::getString('did_number');
        $customer_id = \Yoda\Request::getInt('customer_id');
        $status = \Yoda\Request::getInt('status');

        try{
            $order = new Didww\API2\Order();
            $order->setCustomerId($customer_id);

            $did = new Didww\API2\DIDNumber();
            $did->setDidNumber($did_number);
            $did->setOrder($order);
            $did->changeAutorenew($status);

            $this->setMessage('Autorenew status for DID #' . $did->getDidNumber() . ' was changed successfully');
        }catch (SoapFault $e) {
            $this->setMessage('Error: (' . $e->faultcode . ') ' . $e->faultstring, 'danger');
        }catch (Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
        }

        $this->redirect('index.php?controller=orders&customer_id=' . $customer_id);
    }

}