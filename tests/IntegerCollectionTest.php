<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\IntegerCollection;

final class IntegerCollectionTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [1, 3, 5, 7, 9];
        $set = new IntegerCollection($expected);

        self::assertEquals($expected, $set->toArray());
    }

    public function testGetTotalValue(): void
    {
        $collection = new IntegerCollection([1, 3, 5, 7, 9]);

        self::assertEquals(25, $collection->getTotalValue());
    }

    public function testCreateFromArrayExtractingAndReindexing(): void
    {
        $expected = [
            ['id' => 1, 'total' => 1],
            ['id' => 2, 'total' => 3],
            ['id' => 3, 'total' => 5],
            ['id' => 4, 'total' => 7],
            ['id' => 5, 'total' => 9],
        ];
        $collection = IntegerCollection::createFromArrayExtractingAndReindexing($expected, 'total', 'id');

        self::assertEquals([
            1 => 1,
            2 => 3,
            3 => 5,
            4 => 7,
            5 => 9,
        ], $collection->toArray());
        self::assertEquals(25, $collection->getTotalValue());
    }
}
