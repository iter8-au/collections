<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Collection;

/**
 * @extends Collection<int>
 */
final class IntegerCollection extends Collection
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

    public function getTotalValue(): int
    {
        return array_sum($this->toArray());
    }

    /**
     * @param list<array<array-key, int>> $originalData
     */
    public static function createFromArrayExtractingAndReindexing(
        array $originalData,
        string $columnToExtract,
        string $columnToReindexBy,
    ): self {
        $extractedData = [];

        // TODO: We could add index existence checks here for consistency.
        foreach ($originalData as $row) {
            $extractedData[$row[$columnToReindexBy]] = $row[$columnToExtract];
        }

        return new self($extractedData);
    }
}
