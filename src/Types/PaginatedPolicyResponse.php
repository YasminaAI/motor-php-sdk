<?php

namespace Yasminaai\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Core\Types\ArrayType;

class PaginatedPolicyResponse extends JsonSerializableType
{
    /**
     * @var ?int $currentPage
     */
    #[JsonProperty('current_page')]
    public ?int $currentPage;

    /**
     * @var ?array<Policy> $data
     */
    #[JsonProperty('data'), ArrayType([Policy::class])]
    public ?array $data;

    /**
     * @var ?string $firstPageUrl
     */
    #[JsonProperty('first_page_url')]
    public ?string $firstPageUrl;

    /**
     * @var ?int $from
     */
    #[JsonProperty('from')]
    public ?int $from;

    /**
     * @var ?int $lastPage
     */
    #[JsonProperty('last_page')]
    public ?int $lastPage;

    /**
     * @var ?string $lastPageUrl
     */
    #[JsonProperty('last_page_url')]
    public ?string $lastPageUrl;

    /**
     * @var ?array<PaginationLink> $links
     */
    #[JsonProperty('links'), ArrayType([PaginationLink::class])]
    public ?array $links;

    /**
     * @var ?string $nextPageUrl
     */
    #[JsonProperty('next_page_url')]
    public ?string $nextPageUrl;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?int $perPage
     */
    #[JsonProperty('per_page')]
    public ?int $perPage;

    /**
     * @var ?string $prevPageUrl
     */
    #[JsonProperty('prev_page_url')]
    public ?string $prevPageUrl;

    /**
     * @var ?int $to
     */
    #[JsonProperty('to')]
    public ?int $to;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?PolicyAggregates $aggregates
     */
    #[JsonProperty('aggregates')]
    public ?PolicyAggregates $aggregates;

    /**
     * @param array{
     *   currentPage?: ?int,
     *   data?: ?array<Policy>,
     *   firstPageUrl?: ?string,
     *   from?: ?int,
     *   lastPage?: ?int,
     *   lastPageUrl?: ?string,
     *   links?: ?array<PaginationLink>,
     *   nextPageUrl?: ?string,
     *   path?: ?string,
     *   perPage?: ?int,
     *   prevPageUrl?: ?string,
     *   to?: ?int,
     *   total?: ?int,
     *   aggregates?: ?PolicyAggregates,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentPage = $values['currentPage'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->firstPageUrl = $values['firstPageUrl'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->lastPage = $values['lastPage'] ?? null;
        $this->lastPageUrl = $values['lastPageUrl'] ?? null;
        $this->links = $values['links'] ?? null;
        $this->nextPageUrl = $values['nextPageUrl'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->prevPageUrl = $values['prevPageUrl'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->aggregates = $values['aggregates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
