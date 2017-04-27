<?php

namespace Breeze\Doctrine\Factory;

use Doctrine\ODM\MongoDB\DocumentManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DoctrineContext
 */
class DoctrineContext implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var DocumentManager $documentManager */
        $documentManager = $container->get(DocumentManager::class);

        return new $requestedName($documentManager);
    }
}
