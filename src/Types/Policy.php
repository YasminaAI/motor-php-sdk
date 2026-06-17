<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;
use DateTime;
use Yasminaai\Core\Types\Date;

class Policy extends JsonSerializableType
{
    /**
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?array<string, mixed> $metaData
     */
    #[JsonProperty('meta_data'), ArrayType(['string' => 'mixed'])]
    public ?array $metaData;

    /**
     * @var ?string $startDate
     */
    #[JsonProperty('start_date')]
    public ?string $startDate;

    /**
     * @var ?int $providerPolicyId
     */
    #[JsonProperty('provider_policy_id')]
    public ?int $providerPolicyId;

    /**
     * @var ?string $providerPolicy
     */
    #[JsonProperty('provider_policy')]
    public ?string $providerPolicy;

    /**
     * @var ?int $orderStatus
     */
    #[JsonProperty('order_status')]
    public ?int $orderStatus;

    /**
     * @var ?int $approvalStatus
     */
    #[JsonProperty('approval_status')]
    public ?int $approvalStatus;

    /**
     * @var ?string $endDate
     */
    #[JsonProperty('end_date')]
    public ?string $endDate;

    /**
     * @var ?bool $isClaimed
     */
    #[JsonProperty('is_claimed')]
    public ?bool $isClaimed;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @var ?DateTime $uploadedAt Timestamp when the provider policy document was attached. For issued motor policies this is the closest available issue/purchase timestamp.
     */
    #[JsonProperty('uploaded_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $uploadedAt;

    /**
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public ?string $updatedAt;

    /**
     * @var ?string $clientId
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    public ?string $canceledAt;

    /**
     * @var ?string $invoice
     */
    #[JsonProperty('invoice')]
    public ?string $invoice;

    /**
     * @var ?string $cancellationDocument
     */
    #[JsonProperty('cancellation_document')]
    public ?string $cancellationDocument;

    /**
     * @param array{
     *   id?: ?int,
     *   metaData?: ?array<string, mixed>,
     *   startDate?: ?string,
     *   providerPolicyId?: ?int,
     *   providerPolicy?: ?string,
     *   orderStatus?: ?int,
     *   approvalStatus?: ?int,
     *   endDate?: ?string,
     *   isClaimed?: ?bool,
     *   createdAt?: ?string,
     *   uploadedAt?: ?DateTime,
     *   updatedAt?: ?string,
     *   clientId?: ?string,
     *   canceledAt?: ?string,
     *   invoice?: ?string,
     *   cancellationDocument?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->metaData = $values['metaData'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->providerPolicyId = $values['providerPolicyId'] ?? null;
        $this->providerPolicy = $values['providerPolicy'] ?? null;
        $this->orderStatus = $values['orderStatus'] ?? null;
        $this->approvalStatus = $values['approvalStatus'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->isClaimed = $values['isClaimed'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->uploadedAt = $values['uploadedAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->invoice = $values['invoice'] ?? null;
        $this->cancellationDocument = $values['cancellationDocument'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
