<?php declare(strict_types=1);
namespace IntelligentTestCase;

class ConstDependencyInjectionParameter
{
    private $value;

    public function get()
    {
        return $this->value;
    }

    public function set($value): self
    {
        $this->value = $value;

        return $this;
    }
}
