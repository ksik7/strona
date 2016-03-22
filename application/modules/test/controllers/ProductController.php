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
        $products = ProductQuery::create()->find()->toArray();

        $paginator = Zend_Paginator::factory($products);
        $paginator->setItemCountPerPage(2)
            ->setCurrentPageNumber($this->_getParam('page', 1));

        $test = $paginator->toJson();
        $this->view->products = $paginator->toJson();
        if(!$this->_request->isXmlHttpRequest()){
            $this->view->paginator = $paginator;
        }else{
            $this->view->assign('currentPage', $paginator->getCurrentPageNumber());
        }
    }

    public function addAction()
    {
    }
}