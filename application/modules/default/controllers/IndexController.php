<?php


class IndexController extends Zend_Controller_Action
{

    public function init()
    {

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

