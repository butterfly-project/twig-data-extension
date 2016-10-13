<?php

namespace Butterfly\Component\TwigDataExtension;

use Butterfly\Component\DI\Container;

class TwigDataExtension extends \Twig_Extension
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('data', [$this, 'getForContainer']),
        ];
    }

    /**
     * @param string $instance
     * @return mixed
     */
    public function getForContainer($instance)
    {
        return $this->container->get($instance);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'data.extension';
    }
}
