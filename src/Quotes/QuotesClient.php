<?php

namespace Yasminaai\Quotes;

use Psr\Http\Client\ClientInterface;
use Yasminaai\Core\Client\RawClient;
use Yasminaai\Types\QuoteResponse;
use Yasminaai\Exceptions\YasminaaiException;
use Yasminaai\Exceptions\YasminaaiApiException;
use Yasminaai\Core\Json\JsonApiRequest;
use Yasminaai\Environments;
use Yasminaai\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Yasminaai\Quotes\Types\DeleteQuoteRequestsIdResponse;
use Yasminaai\Quotes\Requests\GetQuoteRequestsRequest;
use Yasminaai\Types\PaginatedQuoteResponse;
use Yasminaai\Core\Json\JsonSerializer;
use Yasminaai\Quotes\Requests\PostQuoteRequestsRequest;

class QuotesClient
{
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
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * @param int $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?QuoteResponse
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function showQuote(int $id, ?array $options = null): ?QuoteResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "quote-requests/{$id}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return QuoteResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new YasminaaiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new YasminaaiException(message: $e->getMessage(), previous: $e);
        }
        throw new YasminaaiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param int $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteQuoteRequestsIdResponse
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function deleteQuote(int $id, ?array $options = null): ?DeleteQuoteRequestsIdResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "quote-requests/{$id}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return DeleteQuoteRequestsIdResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new YasminaaiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new YasminaaiException(message: $e->getMessage(), previous: $e);
        }
        throw new YasminaaiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param GetQuoteRequestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PaginatedQuoteResponse
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function listQuotes(GetQuoteRequestsRequest $request = new GetQuoteRequestsRequest(), ?array $options = null): ?PaginatedQuoteResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->dateFrom != null) {
            $query['date_from'] = JsonSerializer::serializeDate($request->dateFrom);
        }
        if ($request->dateTo != null) {
            $query['date_to'] = JsonSerializer::serializeDate($request->dateTo);
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        if ($request->includeAggregates != null) {
            $query['include_aggregates'] = $request->includeAggregates;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "quote-requests",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return PaginatedQuoteResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new YasminaaiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new YasminaaiException(message: $e->getMessage(), previous: $e);
        }
        throw new YasminaaiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * For getting prices with benefits.
     * The Quote IDs can be used later to issue a policy
     *
     * @param PostQuoteRequestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?QuoteResponse
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function requestQuotes(PostQuoteRequestsRequest $request, ?array $options = null): ?QuoteResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        if ($request->acceptLanguage != null) {
            $headers['Accept-Language'] = $request->acceptLanguage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "quote-requests",
                    method: HttpMethod::POST,
                    headers: $headers,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return QuoteResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new YasminaaiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new YasminaaiException(message: $e->getMessage(), previous: $e);
        }
        throw new YasminaaiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
