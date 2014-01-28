<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class PbxwwController extends ApplicationController
{
    function beforeInitialize()
    {
        parent::beforeInitialize();

        if($_SESSION['isTestMode']) {
            $this->redirect('index.php', 'Sorry... PBXww is working only in production mode', 'danger');
        }
    }

    function index()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $timezone = \Yoda\Request::getInt('timezone');
        $language = \Yoda\Request::getString('language', 'en-GB');
        $site_name = \Yoda\Request::getString('site_name', 'DIDWW Demo');
        $site_url = \Yoda\Request::getString('site_url', 'http://example.com/');
        $help_url = \Yoda\Request::getString('help_url', 'http://example.com/help_url');
        $support_url = \Yoda\Request::getString('support_url', 'http://example.com/support_url');

        $this->getView()->display(null, [
            'customer_id' => $customer_id,
            'timezone' => $timezone,
            'language' => $language,
            'site_name' => $site_name,
            'site_url' => $site_url,
            'help_url' => $help_url,
            'support_url' => $support_url
        ]);
    }

    function panel()
    {
        $customer_id = \Yoda\Request::getInt('customer_id');
        $timezone = \Yoda\Request::getInt('timezone', 2);
        $language = \Yoda\Request::getString('language', 'en-GB');
        $site_name = \Yoda\Request::getString('site_name', 'DIDWW Demo');
        $site_url = \Yoda\Request::getString('site_url', 'http://example.com/');
        $help_url = \Yoda\Request::getString('help_url', 'http://example.com/help_url');
        $support_url = \Yoda\Request::getString('support_url', 'http://example.com/support_url');
        $order_url = \Yoda\Application::liveSite(true) . 'index.php?controller=orders&action=add&customer_id=' . $customer_id . '&pbxww_form=1';

        $request  = new Didww\PBXww\Request();
        $request->setCustomerId($customer_id);
        $request->setResellerId($_SESSION['reseller_id']);

        $did_numbers = DIDHelper::getPBXwwDIDsByCustomerID($customer_id);

        $request->setNumbers($did_numbers);
        $request->setSiteName($site_name);
        $request->setSiteUrl($site_url);
        $request->setHelpUrl($help_url);
        $request->setSupportUrl($support_url);
        $request->setOrderUrl($order_url);
        $request->setTimezone($timezone);
        $request->setLanguage($language);

        $request->getParams($_SESSION['resellerKey']);

        $this->getView()->display(null, [
            'request' => $request,
            'pbxwwdomain' => Didww\PBXww\Request::PBXWW_DEFAULT_HOST
        ]);
    }

}