<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;

class PolicyMonthAggregate extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?float $totalPrice
     */
    #[JsonProperty('total_price')]
    public ?float $totalPrice;

    /**
     * @param array{
     *   count?: ?int,
     *   totalPrice?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->totalPrice = $values['totalPrice'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
