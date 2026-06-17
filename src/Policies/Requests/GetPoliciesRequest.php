<?php

namespace Yasminaai\Policies\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use DateTime;

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
     * @var ?DateTime $dateFrom Inclusive lower bound for the policy date. For issued policies (`status=1`), this filters by `uploaded_at` (the provider policy issue timestamp) and falls back to `created_at` when `uploaded_at` is unavailable. For other statuses, this filters by `created_at`.
     */
    public ?DateTime $dateFrom;

    /**
     * @var ?DateTime $dateTo Inclusive upper bound for the policy date. For issued policies (`status=1`), this filters by `uploaded_at` (the provider policy issue timestamp) and falls back to `created_at` when `uploaded_at` is unavailable. For other statuses, this filters by `created_at`.
     */
    public ?DateTime $dateTo;

    /**
     * @var ?bool $includeAggregates When true, includes policy totals, total price, and monthly buckets for the filtered result set.
     */
    public ?bool $includeAggregates;

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
     *   dateFrom?: ?DateTime,
     *   dateTo?: ?DateTime,
     *   includeAggregates?: ?bool,
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
        $this->dateFrom = $values['dateFrom'] ?? null;
        $this->dateTo = $values['dateTo'] ?? null;
        $this->includeAggregates = $values['includeAggregates'] ?? null;
    }
}
