<?php

class Application_Form_Login extends Zend_Form{

    public function __construct($option = null)
    {
        parent::__construct($option);


        $this->setName('login');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Login:')
            ->setAttrib('class', 'field')
            ->setRequired();

        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('Password:')
            ->setRequired();

        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('Login');

        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction('/auth/auth/login');

    }
}