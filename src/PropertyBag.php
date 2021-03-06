<?php declare(strict_types=1);
namespace IntelligentTestCase;

use function count;
use PHPUnit_Framework_MockObject_MockObject;

class PropertyBag
{
    /** @var string[] */
    private $constructorParams;
    /** @var array */
    private $map;

    /**
     * @param string[] $map
     * @param string[] $constructorParams
     */
    public function __construct(array $map, array $constructorParams)
    {
        $this->map = $map;
        $this->constructorParams = $constructorParams;
    }

    public function __destruct()
    {
        foreach ($this->map as $key => $value) {
            $this->map[$key] = null;
        }
        $this->map = null;
        $this->constructorParams = null;
    }

    /**
     * @param string $name
     * @return ConstDependencyInjectionParameter|false|PHPUnit_Framework_MockObject_MockObject
     */
    public function get(string $name)
    {
        if (!array_key_exists($name, $this->map)) {
            return false;
        }

        return $this->map[$name];
    }

    public function size(): int
    {
        return count($this->constructorParams);
    }

    /**
     * @return string[]
     */
    public function getConstructorParams(): array
    {
        return $this->constructorParams;
    }
}
