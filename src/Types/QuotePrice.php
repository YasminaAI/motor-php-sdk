<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;

class QuotePrice extends JsonSerializableType
{
    /**
     * @var ?string $quotePriceId
     */
    #[JsonProperty('quote_price_id')]
    public ?string $quotePriceId;

    /**
     * @var ?float $deductible
     */
    #[JsonProperty('deductible')]
    public ?float $deductible;

    /**
     * @var ?float $subtotal
     */
    #[JsonProperty('subtotal')]
    public ?float $subtotal;

    /**
     * @var ?float $vatPercentage
     */
    #[JsonProperty('vat_percentage')]
    public ?float $vatPercentage;

    /**
     * @var ?float $vat
     */
    #[JsonProperty('vat')]
    public ?float $vat;

    /**
     * @var ?float $total
     */
    #[JsonProperty('total')]
    public ?float $total;

    /**
     * @param array{
     *   quotePriceId?: ?string,
     *   deductible?: ?float,
     *   subtotal?: ?float,
     *   vatPercentage?: ?float,
     *   vat?: ?float,
     *   total?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->quotePriceId = $values['quotePriceId'] ?? null;
        $this->deductible = $values['deductible'] ?? null;
        $this->subtotal = $values['subtotal'] ?? null;
        $this->vatPercentage = $values['vatPercentage'] ?? null;
        $this->vat = $values['vat'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
