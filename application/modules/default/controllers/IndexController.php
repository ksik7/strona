<?php


class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $autors = ProductQuery::create()
            ->find();
        $this->view->assign('autors', $autors);
    }


}

