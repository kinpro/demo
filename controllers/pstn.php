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

}