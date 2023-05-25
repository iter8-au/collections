<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Set;

/**
 * @extends Set<int>
 */
final class IntegerSet extends Set
{
    /**
     * @param array<int> $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(
            'integer',
            $data
        );
    }

    /**
     * @param list<numeric> $originalData
     */
    public static function createFromNumericValues(array $originalData): self
    {
        $data = [];

        foreach ($originalData as $row) {
            $data[] = (int) $row;
        }

        return new self($data);
    }
}
