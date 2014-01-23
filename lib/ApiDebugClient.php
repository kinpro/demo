<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class ApiDebugClient extends  Didww\API2\ApiClient
{
    private $lastRequest;
    private $lastResponse;

    function debug($message, $rawXML = '')
    {
        if(empty($this->lastRequest)) {
            $this->lastRequest = $rawXML;
        } elseif(empty($this->lastResponse)) {
            $this->lastResponse = $rawXML;
        }
    }

    function getLastResponse(){
        return $this->lastResponse;
    }

    function getLastRequest(){
        return $this->lastRequest;
    }

}