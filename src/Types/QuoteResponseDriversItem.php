<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use DateTime;
use Yasminaai\Core\Types\Date;

class QuoteResponseDriversItem extends JsonSerializableType
{
    /**
     * @var ?string $ownerId Driver's national ID (10 digits starting with 1, 2, or 7)
     */
    #[JsonProperty('owner_id')]
    public ?string $ownerId;

    /**
     * @var ?DateTime $birthdate Driver's birthdate in YYYY-MM-DD format
     */
    #[JsonProperty('birthdate'), Date(Date::TYPE_DATE)]
    public ?DateTime $birthdate;

    /**
     * @var ?int $drivingPercentage Percentage of driving for this driver (25, 50, 75, or 100)
     */
    #[JsonProperty('driving_percentage')]
    public ?int $drivingPercentage;

    /**
     * @param array{
     *   ownerId?: ?string,
     *   birthdate?: ?DateTime,
     *   drivingPercentage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ownerId = $values['ownerId'] ?? null;
        $this->birthdate = $values['birthdate'] ?? null;
        $this->drivingPercentage = $values['drivingPercentage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
