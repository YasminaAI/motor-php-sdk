<?php

namespace Yasminaai\Quotes\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use DateTime;
use Yasminaai\Core\Types\Date;

class PostQuoteRequestsRequestDriversItem extends JsonSerializableType
{
    /**
     * @var string $ownerId Driver's national ID. Must be 10 digits starting with 1, 2, or 7.
     */
    #[JsonProperty('owner_id')]
    public string $ownerId;

    /**
     * @var DateTime $birthdate Driver's birthdate in YYYY-MM-DD format.
     */
    #[JsonProperty('birthdate'), Date(Date::TYPE_DATE)]
    public DateTime $birthdate;

    /**
     * @var int $drivingPercentage Percentage of driving for this driver. Valid values are 25, 50, 75, or 100. The sum of all drivers' percentages must equal 100.
     */
    #[JsonProperty('driving_percentage')]
    public int $drivingPercentage;

    /**
     * @param array{
     *   ownerId: string,
     *   birthdate: DateTime,
     *   drivingPercentage: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ownerId = $values['ownerId'];
        $this->birthdate = $values['birthdate'];
        $this->drivingPercentage = $values['drivingPercentage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
