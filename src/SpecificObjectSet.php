<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Set;

/**
 * An SpecificObjectSet is a collection of objects that are all instances of a specific type (class or interface) that
 * contains no duplicate objects.
 *
 * @extends Set<object>
 */
final class SpecificObjectSet extends Set
{
    /**
     * @param class-string             $classOrInterface
     * @param array<array-key, object> $data
     */
    public function __construct(
        string $classOrInterface,
        array $data = [],
    ) {
        parent::__construct(
            $classOrInterface,
            $data,
        );
    }
}
