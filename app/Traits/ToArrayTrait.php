<?php

namespace App\Traits;

trait ToArrayTrait
{
    /**
     * Get the instance as an array.
     *
     * @return array
     * @throws \ReflectionException
     */
    public function toArray()
    {
        $reflection = new \ReflectionClass($this);

        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        $items = [];

        foreach ($properties as $property){
            $name = $property->getName();
            $items[$name] = $this->{$name};
        }

        return $items;
    }
}
