<?php

declare(strict_types=1);

namespace Iter8\Collections\Test;

use Iter8\Collections\SpecificObjectSet;

final class SpecificObjectSetTest extends TestCase
{
    public function testConstructWithValues(): void
    {
        $expected = [new Foo(), new Foo(), new Foo()];
        $set = new SpecificObjectSet(Foo::class, $expected);

        self::assertEquals($expected, $set->toArray());
    }
}

class Foo
{
}
