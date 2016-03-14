<?php

class Test_ProductController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }
    public function indexAction()
    {
        $products = ProductQuery::create()->find();
        $this->view->assign('products',$products);
    }
    public function addAction()
    {
    }
}