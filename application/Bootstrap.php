<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initPropel()
    {
        require '../vendor/Propel/propel1/runtime/lib/Propel.php';
        //initialize Propel configuration
        Propel::init(APPLICATION_PATH . '/configs/strona-conf.php');

        //initialize Propel connection
        Propel::initialize();

        //return Propel Connection
        return Propel::getConnection();

    }

    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Ks_');

        $acl = new Ks_LibraryAcl_LibraryAcl();
        $auth  = Zend_Auth::getInstance();

        $fc =  Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Ks_Plugin_AccessCheck($acl, $auth));
    }

}
