<?php

class Test_ProductController extends Zend_Controller_Action
{
    public function init()
    {
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addActionContext('index','json')
            ->initContext();
    }

    public function indexAction()
    {
        $products = ProductQuery::create()->find()->getData();

        $paginator = Zend_Paginator::factory($products);
        $paginator->setItemCountPerPage(2)
            ->setCurrentPageNumber($this->_getParam('page', 2));

        $productsJson = $paginator->toJson();
        $this->view->products = $productsJson;
        if(!$this->_request->isXmlHttpRequest()){
            $this->view->paginator = $paginator;
        }
    }

    public function addAction()
    {
    }
}