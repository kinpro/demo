<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

use Didww\API2\ApiCredentials, Didww\API2\ApiClient as Client;

class APIHelper extends ApplicationHelper
{
    static function setupClient()
    {
        Client::setCredentials(new ApiCredentials($_SESSION['username'], $_SESSION['password'], $_SESSION['test_mode']));
//        Client::setDebug(true);
    }

}