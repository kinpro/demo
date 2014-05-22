<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class ApplicationController extends \Yoda\Controller
{
    function beforeInitialize()
    {
        $this->getView()->setTitle('DIDWW Demo');

        if(!isset($_SESSION['reseller_id'])) {
            $this->redirect('index.php?controller=authorize');
        }

        $this->addListener(new BreadcrumbsPlugin()); // add breadcrumbs plugin

        self::setupAPIClient();

        $this->getView()->setProperties([
            'controller' => $this->getName()
        ]);
    }

    static function setupAPIClient()
    {
        return APIHelper::setupClient($_SESSION['username'], $_SESSION['resellerKey'], $_SESSION['isTestMode']);
    }

    function appendRawData()
    {
        /** @var ApiDebugClient $client */
        $client = Didww\API2\ServerObject::getClientInstance();

        $this->getView()->setProperties([
            'request' => $client->getLastRequest(),
            'response' => $client->getLastResponse(),
        ]);
    }

}
