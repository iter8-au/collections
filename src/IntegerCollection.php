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
     * @param list<array<array-key, int|null>> $originalData
     */
    public static function createFromArrayExtractingAndReindexing(
        iterable $originalData,
        string $columnToExtract,
        string $columnToReindexBy,
        int $fallbackColumnToExtract = null,
    ): self {
        $extractedData = [];

        foreach ($originalData as $row) {
            // TODO: We could add index existence checks here for consistency
            $extractedValue = $row[$columnToExtract];

            // Override the extracted column with the fallback, if we have a fallback AND if the extracted value is null.
            if (null !== $fallbackColumnToExtract && null === $extractedValue) {
                $extractedValue = (int) $row[$fallbackColumnToExtract];
            }

            $extractedData[(int) $row[$columnToReindexBy]] = (int) $extractedValue;
        }

        return new self($extractedData);
    }
}
