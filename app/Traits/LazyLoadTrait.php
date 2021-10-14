<?php

namespace App\Traits;

trait LazyLoadTrait
{
    public function load(array $items): bool
    {
        $loaded = false;

        $properties = $this->getClassProperites();

        foreach ($items as $attribute => $value) {
            if (in_array($attribute, $properties)) {
                $this->{$attribute} = $value;
                $loaded = true;
            }
        }
        return $loaded;

    }

    public function getClassProperites(): array
    {
        $ref = new \ReflectionClass($this);

        $properties = $ref->getProperties();
        $items = [];
        foreach ($properties as $property) {
            $items[] = $property->getName();
        }

        return $items;
    }
}
