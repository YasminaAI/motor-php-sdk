<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use DateTime;
use Yasminaai\Core\Types\Date;
use Yasminaai\Core\Types\ArrayType;

class QuoteResponse extends JsonSerializableType
{
    /**
     * @var ?int $ownerId The owner’s national ID or Iqama ID
     */
    #[JsonProperty('owner_id')]
    public ?int $ownerId;

    /**
     * @var ?string $phone The owner's phone number
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?DateTime $birthdate The owner's birthdate. Hijri for Saudi nationals, Gregorian for others
     */
    #[JsonProperty('birthdate'), Date(Date::TYPE_DATE)]
    public ?DateTime $birthdate;

    /**
     * @var ?int $carSequenceNumber The car sequence number from 9 digits
     */
    #[JsonProperty('car_sequence_number')]
    public ?int $carSequenceNumber;

    /**
     * @var ?string $customNumber Custom car number for newly imported cars (present when `custom_number` was used in the request)
     */
    #[JsonProperty('custom_number')]
    public ?string $customNumber;

    /**
     * @var ?bool $isOwnershipTransfer Whether it was a car transfer or not
     */
    #[JsonProperty('is_ownership_transfer')]
    public ?bool $isOwnershipTransfer;

    /**
     * @var ?float $carEstimatedCost The estimated cost of the car
     */
    #[JsonProperty('car_estimated_cost')]
    public ?float $carEstimatedCost;

    /**
     * @var ?int $carModelYear The car model year
     */
    #[JsonProperty('car_model_year')]
    public ?int $carModelYear;

    /**
     * @var ?DateTime $startDate Requested policy start date in YYYY-MM-DD. Returned if provided in the quote request.
     */
    #[JsonProperty('start_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $startDate;

    /**
     * @var ?array<QuoteResponseDriversItem> $drivers List of drivers associated with this quote request. Returned if drivers were provided in the request.
     */
    #[JsonProperty('drivers'), ArrayType([QuoteResponseDriversItem::class])]
    public ?array $drivers;

    /**
     * @var ?array<QuoteResponseQuotesItem> $quotes An array representing each insurance company quote. Each item has the company name, the prices, and the benefits.
     */
    #[JsonProperty('quotes'), ArrayType([QuoteResponseQuotesItem::class])]
    public ?array $quotes;

    /**
     * @var ?string $clientId Your own client ID
     */
    #[JsonProperty('client_id')]
    public ?string $clientId;

    /**
     * @var ?DateTime $updatedAt In case of an update on this quote, this date will change
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?DateTime $createdAt When was the quote requested
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $id Yasmina ID for the quote. You can use it to delete items or showing it again to the customer
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @param array{
     *   ownerId?: ?int,
     *   phone?: ?string,
     *   birthdate?: ?DateTime,
     *   carSequenceNumber?: ?int,
     *   customNumber?: ?string,
     *   isOwnershipTransfer?: ?bool,
     *   carEstimatedCost?: ?float,
     *   carModelYear?: ?int,
     *   startDate?: ?DateTime,
     *   drivers?: ?array<QuoteResponseDriversItem>,
     *   quotes?: ?array<QuoteResponseQuotesItem>,
     *   clientId?: ?string,
     *   updatedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   id?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ownerId = $values['ownerId'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->birthdate = $values['birthdate'] ?? null;
        $this->carSequenceNumber = $values['carSequenceNumber'] ?? null;
        $this->customNumber = $values['customNumber'] ?? null;
        $this->isOwnershipTransfer = $values['isOwnershipTransfer'] ?? null;
        $this->carEstimatedCost = $values['carEstimatedCost'] ?? null;
        $this->carModelYear = $values['carModelYear'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->drivers = $values['drivers'] ?? null;
        $this->quotes = $values['quotes'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
