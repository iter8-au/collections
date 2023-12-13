<?php

declare(strict_types=1);

namespace Iter8\Collections;

use Ramsey\Collection\Collection;

/**
 * An StringCollection is a collection of string values.
 * e.g.
 *
 * StringCollection[
 *   'Task Name A,
 *   'Task Name B'
 *   'Another Task Name',
 * ]
 *
 * or indexed by an ID:
 *
 * StringCollection[
 *   1  => 'Task Name A,
 *   22 => 'Task Name B'
 *   54 => 'Another Task Name',
 * ]
 *
 * @extends Collection<string>
 */
class StringCollection extends Collection
{
    /**
     * @param array<array-key, string> $data
     */
    public function __construct(array $data)
    {
        parent::__construct(
            'string',
            $data
        );
    }

    /**
     * @param iterable<object> $originalData
     */
    public static function createFromObjectExtractingAndReindexing(
        iterable $originalData,
        string $methodToExtract,
        string $methodToReindexBy,
    ): self {
        $extractedData = [];
        foreach ($originalData as $item) {
            // Ignore "Variable method call on object" error in PHPStan (ignoring `method.dynamicName` didn't work)
            // @phpstan-ignore-next-line
            $extractedData[$item->$methodToReindexBy()] = $item->$methodToExtract();
        }

        return new self($extractedData);
    }

    /**
     * @param iterable<array<array-key, string>> $originalData
     */
    public static function createFromArrayExtractingAndReindexing(
        iterable $originalData,
        string $columnToExtract,
        string $columnToReindexBy,
        string $fallbackColumnToExtract = null,
    ): self {
        $extractedData = [];
        foreach ($originalData as $row) {
            $extractedValue = $row[$columnToExtract];

            // Override the extracted column with the fallback, if we have a fallback AND if the extracted value is null.
            if (null !== $fallbackColumnToExtract && null === $extractedValue) {
                $extractedValue = $row[$fallbackColumnToExtract];
            }

            $extractedData[$row[$columnToReindexBy]] = $extractedValue;
        }

        return new self($extractedData);
    }
}
