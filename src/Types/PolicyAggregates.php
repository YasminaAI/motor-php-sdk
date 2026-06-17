<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;

/**
 * Returned only when include_aggregates is true.
 */
class PolicyAggregates extends JsonSerializableType
{
    /**
     * @var ?int $totalCount
     */
    #[JsonProperty('total_count')]
    public ?int $totalCount;

    /**
     * @var ?float $totalPrice
     */
    #[JsonProperty('total_price')]
    public ?float $totalPrice;

    /**
     * @var ?array<string, PolicyMonthAggregate> $byMonth Monthly policy counts and sales totals keyed by YYYY-MM. For issued policies (`status=1`), buckets use `uploaded_at` and fall back to `created_at`.
     */
    #[JsonProperty('by_month'), ArrayType(['string' => PolicyMonthAggregate::class])]
    public ?array $byMonth;

    /**
     * @param array{
     *   totalCount?: ?int,
     *   totalPrice?: ?float,
     *   byMonth?: ?array<string, PolicyMonthAggregate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalCount = $values['totalCount'] ?? null;
        $this->totalPrice = $values['totalPrice'] ?? null;
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
