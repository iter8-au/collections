<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\ObjectSet;

final class ObjectSetTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [new Bar(), new Baz()];
        $set = new ObjectSet($expected);

        self::assertEquals($expected, $set->toArray());
    }
}

class Bar
{
}

class Baz
{
}
