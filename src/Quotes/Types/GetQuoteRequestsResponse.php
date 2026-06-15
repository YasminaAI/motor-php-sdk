<?php

namespace Yasminaai\Quotes\Types;

use Yasminaai\Core\Json\JsonSerializableType;
use Yasminaai\Core\Json\JsonProperty;
use Yasminaai\Types\QuoteResponse;
use Yasminaai\Core\Types\ArrayType;

class GetQuoteRequestsResponse extends JsonSerializableType
{
    /**
     * @var ?int $currentPage
     */
    #[JsonProperty('current_page')]
    public ?int $currentPage;

    /**
     * @var ?array<QuoteResponse> $data
     */
    #[JsonProperty('data'), ArrayType([QuoteResponse::class])]
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
     * @var ?array<GetQuoteRequestsResponseLinksItem> $links
     */
    #[JsonProperty('links'), ArrayType([GetQuoteRequestsResponseLinksItem::class])]
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
     * @param array{
     *   currentPage?: ?int,
     *   data?: ?array<QuoteResponse>,
     *   firstPageUrl?: ?string,
     *   from?: ?int,
     *   lastPage?: ?int,
     *   lastPageUrl?: ?string,
     *   links?: ?array<GetQuoteRequestsResponseLinksItem>,
     *   nextPageUrl?: ?string,
     *   path?: ?string,
     *   perPage?: ?int,
     *   prevPageUrl?: ?string,
     *   to?: ?int,
     *   total?: ?int,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
