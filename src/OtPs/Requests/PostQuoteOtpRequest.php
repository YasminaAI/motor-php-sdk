<?php

namespace Yasminaai\OtPs\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;

class PostQuoteOtpRequest extends JsonSerializableType
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
     * @param array{
     *   email: string,
     *   phone: string,
     *   ownerId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->ownerId = $values['ownerId'];
    }
}
