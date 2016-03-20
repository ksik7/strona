<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    private $_acl;

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


        if(Zend_Auth::getInstance()->hasIdentity()){
            Zend_Registry::set('role',Zend_Auth::getInstance()->getStorage()->read()->user->getRole());
        }else{
            Zend_Registry::set('role','guest');
        }

        $this->_acl = new Ks_LibraryAcl_LibraryAcl();
        $this->_auth  = Zend_Auth::getInstance();
        $this->_identity = $this->_auth->getStorage()->read();

        $fc =  Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Ks_Plugin_AccessCheck($this->_acl, $this->_auth));
    }

    protected function _initViewHelpers(){
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();


        $view->doctype('HTML5');
        $navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
        $navContainer = new Zend_Navigation($navContainerConfig);
        
        $view->navigation($navContainer)->setAcl($this->_acl)->setRole(Zend_Registry::get('role'));
    }

}
