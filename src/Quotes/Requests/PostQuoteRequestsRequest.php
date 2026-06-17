<?php

namespace Yasminaai\Quotes\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Quotes\Types\PostQuoteRequestsRequestAcceptLanguage;
use Yasminaai\Core\Json\JsonProperty;
use DateTime;
use Yasminaai\Core\Types\Date;
use Yasminaai\Quotes\Types\PostQuoteRequestsRequestDriversItem;
use Yasminaai\Core\Types\ArrayType;

class PostQuoteRequestsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<PostQuoteRequestsRequestAcceptLanguage> $acceptLanguage Set to ar to receive Arabic-localized quote content.
     */
    public ?string $acceptLanguage;

    /**
     * @var string $otp The OTP received by the customer from the Request OTP API
     */
    #[JsonProperty('otp')]
    public string $otp;

    /**
     * @var string $ownerId Owner ID must be 10 digits starting with 1, 2, or 7
     */
    #[JsonProperty('owner_id')]
    public string $ownerId;

    /**
     * @var ?string $email Email address must be valid and belongs to the customer
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var string $phone Phone number must start with 05 and be 10 digits
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var DateTime $birthdate Birthdate in YYYY-MM-DD format
     */
    #[JsonProperty('birthdate'), Date(Date::TYPE_DATE)]
    public DateTime $birthdate;

    /**
     * @var ?string $carSequenceNumber Car sequence number must be 8 or 9 digits
     */
    #[JsonProperty('car_sequence_number')]
    public ?string $carSequenceNumber;

    /**
     * @var ?string $customNumber Custom car number between 1000000 and 9999999999 (for newly imported cars)
     */
    #[JsonProperty('custom_number')]
    public ?string $customNumber;

    /**
     * @var ?bool $isOwnershipTransfer Indicates if the ownership is being transferred
     */
    #[JsonProperty('is_ownership_transfer')]
    public ?bool $isOwnershipTransfer;

    /**
     * @var ?string $currentCarOwnerId Required if is_ownership_transfer is true; 10 digits starting with 1,2,7
     */
    #[JsonProperty('current_car_owner_id')]
    public ?string $currentCarOwnerId;

    /**
     * @var float $carEstimatedCost Estimated cost of the car
     */
    #[JsonProperty('car_estimated_cost')]
    public float $carEstimatedCost;

    /**
     * @var ?int $carModelYear Car model year between 1950 and next year
     */
    #[JsonProperty('car_model_year')]
    public ?int $carModelYear;

    /**
     * @var ?DateTime $startDate Desired policy start date in YYYY-MM-DD. Must be between tomorrow and 28 days from today (inclusive). The platform validates this range server-side.
     */
    #[JsonProperty('start_date'), Date(Date::TYPE_DATE)]
    public ?DateTime $startDate;

    /**
     * @var ?array<PostQuoteRequestsRequestDriversItem> $drivers List of drivers for the vehicle. When provided, the sum of all driving_percentage values must equal 100, and the owner must be included among the drivers.
     */
    #[JsonProperty('drivers'), ArrayType([PostQuoteRequestsRequestDriversItem::class])]
    public ?array $drivers;

    /**
     * @param array{
     *   otp: string,
     *   ownerId: string,
     *   phone: string,
     *   birthdate: DateTime,
     *   carEstimatedCost: float,
     *   acceptLanguage?: ?value-of<PostQuoteRequestsRequestAcceptLanguage>,
     *   email?: ?string,
     *   carSequenceNumber?: ?string,
     *   customNumber?: ?string,
     *   isOwnershipTransfer?: ?bool,
     *   currentCarOwnerId?: ?string,
     *   carModelYear?: ?int,
     *   startDate?: ?DateTime,
     *   drivers?: ?array<PostQuoteRequestsRequestDriversItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->acceptLanguage = $values['acceptLanguage'] ?? null;
        $this->otp = $values['otp'];
        $this->ownerId = $values['ownerId'];
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'];
        $this->birthdate = $values['birthdate'];
        $this->carSequenceNumber = $values['carSequenceNumber'] ?? null;
        $this->customNumber = $values['customNumber'] ?? null;
        $this->isOwnershipTransfer = $values['isOwnershipTransfer'] ?? null;
        $this->currentCarOwnerId = $values['currentCarOwnerId'] ?? null;
        $this->carEstimatedCost = $values['carEstimatedCost'];
        $this->carModelYear = $values['carModelYear'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->drivers = $values['drivers'] ?? null;
    }
}
