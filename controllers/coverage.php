<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class CoverageController extends ApplicationController
{
    function index()
    {
        $this->getView()->setProperties(['countries' => Didww\API2\Country::getAll()])->display();
    }

    function show()
    {
        $countryIso = \Yoda\Request::getString('iso');

        $country = new Didww\API2\Country();
        $country->setCountryIso($countryIso);
        $country->loadCities();

        $cities = $country->getCities();
        $this->getView()->setProperties(['cities' => $cities])->display();
    }

}