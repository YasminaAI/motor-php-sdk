<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;

class Benefit extends JsonSerializableType
{
    /**
     * @var ?string $quoteBenefitId
     */
    #[JsonProperty('quote_benefit_id')]
    public ?string $quoteBenefitId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $nameAr Arabic name of the benefit. Use this field instead of `name` when rendering Arabic UIs.
     */
    #[JsonProperty('name_ar')]
    public ?string $nameAr;

    /**
     * @var ?float $amount
     */
    #[JsonProperty('amount')]
    public ?float $amount;

    /**
     * @var ?float $vat
     */
    #[JsonProperty('vat')]
    public ?float $vat;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   quoteBenefitId?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   nameAr?: ?string,
     *   amount?: ?float,
     *   vat?: ?float,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->quoteBenefitId = $values['quoteBenefitId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nameAr = $values['nameAr'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->vat = $values['vat'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
