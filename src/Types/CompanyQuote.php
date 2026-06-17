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
     * @var ?string $companyNameAr Arabic name of the insurance company. Use this field instead of `company_name` when rendering Arabic UIs.
     */
    #[JsonProperty('company_name_ar')]
    public ?string $companyNameAr;

    /**
     * @var ?value-of<CompanyQuoteType> $type Normalised insurance category used to group and filter quotes. Always one of `TPL`, `TPL +`, or `Comprehensive`.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $insuranceTypeDisplay The insurance type label exactly as the insurance provider intends it to be displayed. While `type` normalises all non-TPL / non-Comprehensive values into `TPL +`, this field preserves the original provider string (e.g. "TPL Plus", "Third Party Plus") and should be shown in the UI wherever the provider's own wording is preferred.
     */
    #[JsonProperty('insurance_type_display')]
    public ?string $insuranceTypeDisplay;

    /**
     * @var ?string $insuranceTypeDisplayAr Arabic translation of `insurance_type_display`. Use this field for Arabic UIs. Falls back to the English value for provider-specific types that do not have a translation.
     */
    #[JsonProperty('insurance_type_display_ar')]
    public ?string $insuranceTypeDisplayAr;

    /**
     * @var ?string $companyLogoUrl CDN URL for the insurance company's logo.
     */
    #[JsonProperty('company_logo_url')]
    public ?string $companyLogoUrl;

    /**
     * @var ?string $squareCompanyLogoUrl CDN URL for the insurance company's square logo.
     */
    #[JsonProperty('square_company_logo_url')]
    public ?string $squareCompanyLogoUrl;

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
     *   companyNameAr?: ?string,
     *   type?: ?value-of<CompanyQuoteType>,
     *   insuranceTypeDisplay?: ?string,
     *   insuranceTypeDisplayAr?: ?string,
     *   companyLogoUrl?: ?string,
     *   squareCompanyLogoUrl?: ?string,
     *   prices?: ?array<QuotePrice>,
     *   benefits?: ?array<Benefit>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyName = $values['companyName'] ?? null;
        $this->companyNameAr = $values['companyNameAr'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->insuranceTypeDisplay = $values['insuranceTypeDisplay'] ?? null;
        $this->insuranceTypeDisplayAr = $values['insuranceTypeDisplayAr'] ?? null;
        $this->companyLogoUrl = $values['companyLogoUrl'] ?? null;
        $this->squareCompanyLogoUrl = $values['squareCompanyLogoUrl'] ?? null;
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
