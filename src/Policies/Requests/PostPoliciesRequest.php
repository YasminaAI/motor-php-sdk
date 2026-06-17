<?php

namespace Yasminaai\Policies\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;

class PostPoliciesRequest extends JsonSerializableType
{
    /**
     * @var string $otp The OTP received by the customer from the Issue OTP API
     */
    #[JsonProperty('otp')]
    public string $otp;

    /**
     * @var int $quoteRequestId ID of the car quote request
     */
    #[JsonProperty('quote_request_id')]
    public int $quoteRequestId;

    /**
     * @var string $quoteReferenceId Unique identifier for the quote reference ID (coming from POST /quote-requests)
     */
    #[JsonProperty('quote_reference_id')]
    public string $quoteReferenceId;

    /**
     * @var string $quotePriceId Unique identifier for the quote price ID that exists inside a quote item (coming from POST /quote-requests)
     */
    #[JsonProperty('quote_price_id')]
    public string $quotePriceId;

    /**
     * @var ?array<string> $benefits List of benefit UUIDs
     */
    #[JsonProperty('benefits'), ArrayType(['string'])]
    public ?array $benefits;

    /**
     * @var ?array<string, mixed> $extraFields Optional free-form object with additional fields. Total JSON-encoded size must not exceed 255 characters.
     */
    #[JsonProperty('extra_fields'), ArrayType(['string' => 'mixed'])]
    public ?array $extraFields;

    /**
     * @param array{
     *   otp: string,
     *   quoteRequestId: int,
     *   quoteReferenceId: string,
     *   quotePriceId: string,
     *   benefits?: ?array<string>,
     *   extraFields?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->otp = $values['otp'];
        $this->quoteRequestId = $values['quoteRequestId'];
        $this->quoteReferenceId = $values['quoteReferenceId'];
        $this->quotePriceId = $values['quotePriceId'];
        $this->benefits = $values['benefits'] ?? null;
        $this->extraFields = $values['extraFields'] ?? null;
    }
}
