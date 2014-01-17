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
        if(!isset($_SESSION['reseller_id'])) {
            $this->redirect('index.php?controller=authorize');
        }

        $this->addObserver(new BreadcrumbsPlugin()); // add breadcrumbs plugin

        APIHelper::setupClient();

        $this->getView()->setProperties([
            'controller' => $this->getName()
        ]);
    }

}