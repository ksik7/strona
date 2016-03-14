<?php


class Ks_Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract
{

    private $_acl = null;
    private $_auth = null;

    public function __construct(Zend_Acl $acl, Zend_Auth $auth)
    {
        $this->_acl = $acl;
        $this->_auth = $auth;
    }

    /**
     * @param Zend_Controller_Request_Abstract $request
     * @var Users $user
     */

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {/*
        $module = $request->getModuleName();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $resource = "{$module}-{$controller}";

        $identity = $this->_auth->getStorage()->read();

        if(!$user = $identity->user){
            $role = '';
        }
        else{
            $role = $user->getRole();
        }
        if (!$this->_acl->isAllowed($role, $resource, $action)) {
            $request->setModuleName('default');
       }*/
    }

}