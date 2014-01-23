<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

use Didww\API2\ApiCredentials, Didww\API2\ApiClient as Client;
use Didww\API2\ApiDetails;

class AuthorizeController extends \Yoda\Controller
{
    function index()
    {
        $this->getView()->setLayout('login')->renderLayout();
    }

    function login()
    {
        $userName = \Yoda\Request::getString('username');
        $password = \Yoda\Request::getString('password');
        $testMode = \Yoda\Request::getBool('test_mode');

        try{
            Client::setCredentials(new ApiCredentials($userName, $password, $testMode));
//            Client::setDebug(true);

            $details = new ApiDetails();
        }catch (SoapFault $e) {
            $this->redirect('index.php?controller=authorize', 'Error: (' . $e->faultcode . ') ' . $e->faultstring, 'error');
        }
        catch (Exception $e) {
            $this->redirect('index.php?controller=authorize',  $e->getMessage(), 'error');
        }


        $_SESSION['username'] = $userName;
        $_SESSION['password'] = $password;
        $_SESSION['test_mode'] = $testMode;

        $_SESSION['reseller_id'] = $details->getResellerId();
        $this->redirect('index.php');

    }

    function sign_out()
    {
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        $this->redirect('index.php', 'Signed out successfully.');
    }
}