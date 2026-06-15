<?php

namespace Yasminaai\Policies\Requests;

use Yasminaai\Core\Json\JsonSerializableType;

class GetPoliciesRequest extends JsonSerializableType
{
    /**
     * @var ?int $quoteRequestId
     */
    public ?int $quoteRequestId;

    /**
     * @var ?string $quotePriceId
     */
    public ?string $quotePriceId;

    /**
     * @var ?int $providerPolicyId
     */
    public ?int $providerPolicyId;

    /**
     * @var ?string $carSequenceNumber
     */
    public ?string $carSequenceNumber;

    /**
     * @var ?string $newOwnerId
     */
    public ?string $newOwnerId;

    /**
     * @var ?string $previousOwnerId
     */
    public ?string $previousOwnerId;

    /**
     * @var ?int $status
     */
    public ?int $status;

    /**
     * @var ?float $minPrice
     */
    public ?float $minPrice;

    /**
     * @var ?float $maxPrice
     */
    public ?float $maxPrice;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @param array{
     *   quoteRequestId?: ?int,
     *   quotePriceId?: ?string,
     *   providerPolicyId?: ?int,
     *   carSequenceNumber?: ?string,
     *   newOwnerId?: ?string,
     *   previousOwnerId?: ?string,
     *   status?: ?int,
     *   minPrice?: ?float,
     *   maxPrice?: ?float,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->quoteRequestId = $values['quoteRequestId'] ?? null;
        $this->quotePriceId = $values['quotePriceId'] ?? null;
        $this->providerPolicyId = $values['providerPolicyId'] ?? null;
        $this->carSequenceNumber = $values['carSequenceNumber'] ?? null;
        $this->newOwnerId = $values['newOwnerId'] ?? null;
        $this->previousOwnerId = $values['previousOwnerId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->minPrice = $values['minPrice'] ?? null;
        $this->maxPrice = $values['maxPrice'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
