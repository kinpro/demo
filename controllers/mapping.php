<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class MappingController extends ApplicationController
{
    function index()
    {
        $this->redirect('index.php?controller=mapping&action=add');
    }

    function add()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $did_number = \Yoda\Request::getString('did_number');

        $this->getView()->setProperties(['customer_id' => $customer_id, 'did' => $did_number])->display();
    }

    function update()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $did_number = \Yoda\Request::getString('did_number');
        $map_type = \Yoda\Request::getString('map_type');
        $map_proto = \Yoda\Request::getString('map_proto');
        $host = \Yoda\Request::getString('host');
        $map_details = \Yoda\Request::getString('map_details');

        try {
            switch($map_type) {
                case 'gtalk':
                    $mapping = new Didww\API2\Mapping\Gtalk($map_details);
                    break;
                case 'pstn':
                    $mapping = new Didww\API2\Mapping\PSTN($map_details);
                    break;
                case 'voip':
                    switch($map_proto) {
                        case 'sip':
                            $mapping = new Didww\API2\Mapping\SIP($host, $map_details);
                            break;
                        case 'h323':
                            $mapping = new Didww\API2\Mapping\H323($host, $map_details);
                            break;
                        case 'iax':
                            $mapping = new Didww\API2\Mapping\IAX($host, $map_details);
                            break;
                        default:
                    }
                    break;
                case 'pbxww':
                    $mapping = new Didww\API2\Mapping\PBXww();
                    break;
                default:
                    break;
            }

            $order = new Didww\API2\Order();
            $order->setCustomerId($customer_id);

            $did = new Didww\API2\DIDNumber();
            $did->setDidNumber($did_number);
            $did->setOrder($order);
            $did->updateMapping($mapping);

            $this->setMessage('Mapping was changed successfully');
        } catch(SoapFault $e) {
            $this->setMessage("Error: (" . $e->faultcode . ") " . $e->faultstring, 'danger');
            $this->redirect('index.php?controller=mapping&action=add&did_number=' . $did_number . '&customer_id=' . $customer_id);
        } catch(Exception $e) {
            $this->setMessage($e->getMessage(), 'danger');
            $this->redirect('index.php?controller=mapping&action=add&did_number=' . $did_number . '&customer_id=' . $customer_id);
        }

        $this->redirect('index.php?controller=orders&customer_id=' . $customer_id);
    }

}