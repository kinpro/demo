<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

use Didww\API2\ApiDetails;

class DefaultController extends ApplicationController
{
    function index()
    {
        $details = new ApiDetails();

        $this->getView()->setProperties(['details' => $details])->display();
    }

}