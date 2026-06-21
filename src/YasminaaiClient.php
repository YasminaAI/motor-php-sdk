<?php

namespace Yasminaai;

use Yasminaai\Quotes\QuotesClient;
use Yasminaai\Policies\PoliciesClient;
use Yasminaai\OtPs\OtPsClient;
use Psr\Http\Client\ClientInterface;
use Yasminaai\Core\Client\RawClient;

class YasminaaiClient
{
    /**
     * @var QuotesClient $quotes
     */
    public QuotesClient $quotes;

    /**
     * @var PoliciesClient $policies
     */
    public PoliciesClient $policies;

    /**
     * @var OtPsClient $otPs
     */
    public OtPsClient $otPs;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Yasminaai',
            'X-Fern-SDK-Version' => '0.1.0',
            'User-Agent' => 'yasminaai/yasminaai/0.1.0',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->quotes = new QuotesClient($this->client, $this->options);
        $this->policies = new PoliciesClient($this->client, $this->options);
        $this->otPs = new OtPsClient($this->client, $this->options);
    }
}
