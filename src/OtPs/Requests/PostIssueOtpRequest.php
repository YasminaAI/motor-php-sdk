<?php

namespace Yasminaai\OtPs\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;

class PostIssueOtpRequest extends JsonSerializableType
{
    /**
     * @var string $email Email address of the car owner
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $phone Phone number starting with 05 and containing 10 digits
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var string $ownerId National ID or Iqama ID of the car owner (10 digits)
     */
    #[JsonProperty('owner_id')]
    public string $ownerId;

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
     * @param array{
     *   email: string,
     *   phone: string,
     *   ownerId: string,
     *   quoteRequestId: int,
     *   quoteReferenceId: string,
     *   quotePriceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->ownerId = $values['ownerId'];
        $this->quoteRequestId = $values['quoteRequestId'];
        $this->quoteReferenceId = $values['quoteReferenceId'];
        $this->quotePriceId = $values['quotePriceId'];
    }
}
