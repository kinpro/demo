<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class BreadcrumbsPlugin implements \Yoda\Observer\Observer
{
    public function notify($event, $controller)
    {
        if($event == 'onBeforeControllerExecute') {
            $name = $controller->getName();
            $action = $controller->getCurrentAction();

            $titles = ['Dashboard'];
            $links = [];

            if($name == 'customers') {
                $titles[] = "Customers";
                $links[] = 'index.php';
            }
            if($name == 'balance') {
                $titles[] = "Balance";
                $links[] = 'index.php';
            }
            if($name == 'call_history') {
                $titles[] = "Call History";
                $links[] = 'index.php';
            }
            if($name == 'pstn') {
                $titles[] = "PSTN";
                $links[] = 'index.php';
            }
            if($name == 'mapping') {
                $titles[] = "Change Mapping";
                $links[] = 'index.php';
            }
            if($name == 'pbxww') {
                $titles[] = "PBXww";
                $links[] = 'index.php';
            }
            if($name == 'toll_free') {
                $titles[] = "Toll Free";
                $links[] = 'index.php';
            }
            if($name == 'orders') {
                $titles[] = "Customers";
                $links[] = 'index.php';
                $titles[] = "New Order";
                $links[] = 'index.php?controller=customers';
            }
            if($name == 'coverage') {
                $titles[] = "Coverage";
                $links[] = 'index.php';
                if($action == 'show') {
                    $titles[] = \Yoda\Request::getString('iso');
                    $links[] = 'index.php?controller=coverage';
                }
            }

            $html = "";
            for($i = 0; $i < sizeof($titles); $i++) {
                if(isset($links[$i]))
                    $html .= "<li><a href='" . $links[$i] . "'>" . $titles[$i] . "</a></li>";
                else
                    $html .= "<li class='active'>" . $titles[$i] . "</li>";
            }
            $html = "<ul class='breadcrumb'>" . $html . "</ul>";

            if(count($titles))
                $controller->getView()->setProperties(['breadcrumbs' => $html]);
        }
    }
}
