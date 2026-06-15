<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;

class CompanyQuote extends JsonSerializableType
{
    /**
     * @var ?string $companyName
     */
    #[JsonProperty('company_name')]
    public ?string $companyName;

    /**
     * @var ?array<QuotePrice> $prices
     */
    #[JsonProperty('prices'), ArrayType([QuotePrice::class])]
    public ?array $prices;

    /**
     * @var ?array<Benefit> $benefits
     */
    #[JsonProperty('benefits'), ArrayType([Benefit::class])]
    public ?array $benefits;

    /**
     * @param array{
     *   companyName?: ?string,
     *   prices?: ?array<QuotePrice>,
     *   benefits?: ?array<Benefit>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyName = $values['companyName'] ?? null;
        $this->prices = $values['prices'] ?? null;
        $this->benefits = $values['benefits'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
