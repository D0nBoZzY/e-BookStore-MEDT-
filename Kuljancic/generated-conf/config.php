<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('ebibliothek', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
  'dsn' => 'mysql:host=localhost;dbname=ebibliothek',
  'user' => 'insy4',
  'password' => 'blabla',
));
$manager->setName('ebibliothek');
$serviceContainer->setConnectionManager('ebibliothek', $manager);
$serviceContainer->setDefaultDatasource('ebibliothek');