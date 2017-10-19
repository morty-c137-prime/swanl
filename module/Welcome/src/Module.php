<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Welcome;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
    	return [
    		'factories' => [
                Model\MOTDTable::class => function($serviceManager) {
                    $tableGateway = $serviceManager->get(Model\MOTDTableGateway::class);
                    return new Model\MOTDTable($tableGateway);
                },
                Model\MOTDTableGateway::class => function ($serviceManager) {
                    $dbAdapter = $serviceManager->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\MOTD());
                    return new TableGateway('motd', $dbAdapter, null, $resultSetPrototype);
                },
            ],
    	];
    }
}
