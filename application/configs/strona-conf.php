<?php
// This file generated by Propel 1.7.1 convert-conf target
// from XML runtime conf file C:\xampp\htdocs\strona\vendor\propel\propel1\generator\bin\runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'strona' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=strona',
        'user' => 'root',
        'password' => '',
      ),
    ),
    'default' => 'strona',
  ),
  'generator_version' => '1.7.1',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-strona-conf.php');
return $conf;