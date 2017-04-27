<?php

namespace Breeze\Doctrine\Connection;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class Mongo
 */
class Mongo implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DocumentManager
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        AnnotationDriver::registerAnnotationClasses();

        $config = $container->get('config')['doctrine'] ?? [];

        $settings = new Configuration();
        $settings->setProxyDir(BASE_PATH . '/data/proxies');
        $settings->setProxyNamespace('Proxies');
        $settings->setHydratorDir(BASE_PATH . '/data/hydrators');
        $settings->setHydratorNamespace('Hydrators');
        $settings->setMetadataDriverImpl(AnnotationDriver::create($config['drivers'] ?? []));

        $connection = new Connection($config['server']);

        return DocumentManager::create($connection, $settings);
    }
}
