<?php

namespace Yasminaai\Quotes\Requests;

use Yasminaai\Core\Json\JsonSerializableType;
use DateTime;

class GetQuoteRequestsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $dateFrom Inclusive lower bound for quote request creation date.
     */
    public ?DateTime $dateFrom;

    /**
     * @var ?DateTime $dateTo Inclusive upper bound for quote request creation date.
     */
    public ?DateTime $dateTo;

    /**
     * @var ?int $perPage Number of quote requests to return per page.
     */
    public ?int $perPage;

    /**
     * @var ?bool $includeAggregates When true, includes quote request totals and monthly buckets for the filtered result set.
     */
    public ?bool $includeAggregates;

    /**
     * @param array{
     *   dateFrom?: ?DateTime,
     *   dateTo?: ?DateTime,
     *   perPage?: ?int,
     *   includeAggregates?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dateFrom = $values['dateFrom'] ?? null;
        $this->dateTo = $values['dateTo'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->includeAggregates = $values['includeAggregates'] ?? null;
    }
}
