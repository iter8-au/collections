<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Collection;
use Ramsey\Collection\Set;

/**
 * @extends Set<array<array-key, mixed>>
 */
final class ArraySet extends Set
{
    /**
     * @param array<array-key, array<array-key, mixed>> $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(
            'array',
            $data
        );
    }

    /**
     * @return list<mixed>
     */
    public function getValues(): array
    {
        return array_values($this->toArray());
    }

    /**
     * @param Collection<array<array-key, mixed>> $collection
     */
    public static function createFromCollection(Collection $collection): self
    {
        /** @var array<array-key, array<array-key, mixed>> $array */
        $array = $collection->toArray();

        return new self($array);
    }

    /**
     * Create an ArraySet from $originalData but reindexing each element with the key from column $columnToReindexBy in
     * each element.
     *
     * This is useful for reindexing a (plain 0-index array) database result set by an identity column, e.g.:
     * ```
     * [
     *   ['id' => 5, 'name' => 'foo', 'desc' => 'Lorem ipsum'],
     *   ['id' => 22, 'name' => 'bar', 'desc' => 'Veni vidi'],
     *   ...
     * ]
     * ```
     *
     * Can be turned into the following by calling `ArraySet::createFromArrayAndReindex([...], 'id')`:
     * ```
     * ArraySet[
     *    5 => ['id' => 5, 'name' => 'foo', 'desc' => 'Lorem ipsum'],
     *    22 => ['id' => 22, 'name' => 'bar', 'desc' => 'Veni vidi'],
     * ]
     * ```
     *
     * @param list<array<array-key, int|string>> $originalData
     */
    public static function createFromArrayAndReindex(
        array $originalData,
        string $columnToReindexBy,
    ): self {
        /** @var array<array-key, array<array-key, int|string>> $data */
        $data = [];

        foreach ($originalData as $row) {
            $data[$row[$columnToReindexBy]] = $row;
        }

        return new self($data);
    }
}
