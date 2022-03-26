<?php declare(strict_types=1);
namespace mzb\Container;

use ReflectionMethod;
use App\Container\Exception\NotFound;
use Psr\Container\ContainerInterface;

interface ResolverContainerInterface extends ContainerInterface
{

    /**
     * Resolve service arguments
     *
     * @param ReflectionMethod $method
     * @return array
     *
     * @throws NotFound No parameter was found for constructor identifier
     */
    public function resolve(ReflectionMethod $method): array;
}