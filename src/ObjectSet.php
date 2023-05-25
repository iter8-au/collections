<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Set;

/**
 * An ObjectSet is a collection of objects that contains no duplicate objects.
 *
 * @extends Set<object>
 */
final class ObjectSet extends Set
{
    /**
     * @param array<object> $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(
            'object',
            $data
        );
    }
}
