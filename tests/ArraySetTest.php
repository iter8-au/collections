<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\ArraySet;
use Ramsey\Collection\Collection;

final class ArraySetTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [
            ['cool' => 'value'],
            ['another' => 'row'],
        ];
        $set = new ArraySet($expected);

        self::assertEquals($expected, $set->toArray());
    }

    public function testGetValues(): void
    {
        $set = new ArraySet([
            1 => ['cool' => 'value'],
            2 => ['another' => 'row'],
        ]);

        self::assertEquals([
            ['cool' => 'value'],
            ['another' => 'row'],
        ], $set->getValues());
    }

    public function testCreateFromCollection(): void
    {
        $expected = [
            ['cool' => 'value'],
            ['another' => 'row', 'id' => 2],
            ['id' => 1],
        ];
        /** @var Collection<array<array-key, mixed>> $collection */
        $collection = new Collection('array', $expected);
        $set = ArraySet::createFromCollection($collection);

        self::assertEquals($expected, $set->toArray());
    }

    public function testCreateFromArrayAndReindex(): void
    {
        $expected = [
            5 => ['id' => 5, 'name' => 'foo', 'desc' => 'Lorem ipsum'],
            22 => ['id' => 22, 'name' => 'bar', 'desc' => 'Veni vidi'],
        ];

        $set = ArraySet::createFromArrayAndReindex([
            ['id' => 5, 'name' => 'foo', 'desc' => 'Lorem ipsum'],
            ['id' => 22, 'name' => 'bar', 'desc' => 'Veni vidi'],
        ], 'id');

        self::assertEquals($expected, $set->toArray());
    }
}
