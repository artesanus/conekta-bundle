<?php

namespace Artesanus\ConektaBundle\Tests;

use \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase as KernelTestCaseBase;

/**
 * Class KernelTestCase
 * @package Artesanus\ConektaBundle
 * @author Cristian Angulo Nova <@nietzchezon>
 */

class KernelTestCase extends KernelTestCaseBase
{

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->container = null;
        parent::tearDown();
    }

    /**
     * @param array $options
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getContainer(array $options = [])
    {
        if (!$this->container) {
            static::bootKernel($options);
            $this->container = static::$kernel->getContainer();
        }

        return $this->container;
    }

    /**
     * @param string $parameter
     * @return mixed
     */
    protected function getParameter($parameter)
    {
        return $this->getContainer()->getParameter($parameter);
    }

}