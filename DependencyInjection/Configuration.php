<?php

namespace Artesanus\ConektaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('conekta');

        $this->addApiKeys($rootNode);
        $this->addLocale($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */

    private function addApiKeys(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('api_keys')
                    ->children()
                        ->scalarNode('public')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('private')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */

    private function addLocale(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode('locale')->defaultValue('en')->end()
            ->end()
        ;
    }
}
