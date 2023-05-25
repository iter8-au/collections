<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\ScalarSet;

final class ScalarSetTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [1, '2', 3];
        $set = new ScalarSet($expected);

        self::assertEquals($expected, $set->toArray());
    }
}
