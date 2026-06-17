<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;

/**
 * Returned only when include_aggregates is true.
 */
class QuoteRequestAggregates extends JsonSerializableType
{
    /**
     * @var ?int $totalCount
     */
    #[JsonProperty('total_count')]
    public ?int $totalCount;

    /**
     * @var ?array<string, int> $byMonth Monthly quote request counts keyed by YYYY-MM.
     */
    #[JsonProperty('by_month'), ArrayType(['string' => 'integer'])]
    public ?array $byMonth;

    /**
     * @param array{
     *   totalCount?: ?int,
     *   byMonth?: ?array<string, int>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalCount = $values['totalCount'] ?? null;
        $this->byMonth = $values['byMonth'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
