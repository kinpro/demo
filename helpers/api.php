<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

use Didww\API2\ApiCredentials;

class APIHelper extends ApplicationHelper
{
    static function setupClient($username = null, $resellerKey = null, $isTestMode = null)
    {
        ApiDebugClient::setCredentials(new ApiCredentials($username, $resellerKey, $isTestMode));
        $debug = \Yoda\Application::$config['application']['debugSoap'];
        ApiDebugClient::setDebug($debug);
        $client = new ApiDebugClient();
        Didww\API2\ServerObject::setGlobalClient($client);

        return $client;
    }

}