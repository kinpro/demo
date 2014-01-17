<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class CitiesController extends ApplicationController
{
    function index()
    {
        $countryIso = \Yoda\Request::getString('iso');

        $country = new Didww\API2\Country();
        $country->setCountryIso($countryIso);
        $country->loadCities();

        $cities = $country->getCities();
        $result = [];
        foreach($cities as $city) {
            $o = new stdClass();
            $o->id = $city->getCityId();
            $o->name = $city->getCityName();
            $o->prefix = $city->getCityPrefix();
            $result[] = $o;
        }

        echo json_encode($result);
    }

}