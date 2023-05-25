<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\IntegerSet;

final class IntegerSetTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [1, 3, 5, 7, 9];
        $set = new IntegerSet($expected);

        self::assertEquals($expected, $set->toArray());
    }

    public function testCreateFromNumericValues(): void
    {
        $expected = [1, 3, 5, 7, 9];
        $set = IntegerSet::createFromNumericValues(['1', '3', '5', '7', '9']);

        self::assertEquals($expected, $set->toArray());
    }
}
