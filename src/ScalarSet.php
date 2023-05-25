<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Set;

/**
 * @extends Set<scalar>
 */
final class ScalarSet extends Set
{
    /**
     * @param array<scalar> $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct(
            'scalar',
            $data
        );
    }

    /**
     * @param list<array<array-key, int|string>> $originalData
     */
    public static function createFromArrayExtractingAndReindexing(
        array $originalData,
        string $columnToExtract,
        string $columnToReindexBy,
    ): self {
        /** @var array<array-key, int|string> $extractedData */
        $extractedData = [];

        // TODO: We could add index existence checks here for consistency.
        foreach ($originalData as $row) {
            $extractedData[$row[$columnToReindexBy]] = $row[$columnToExtract];
        }

        return new self($extractedData);
    }
}
