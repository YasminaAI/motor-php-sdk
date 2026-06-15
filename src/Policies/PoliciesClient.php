<?php

namespace Yasminaai\Policies;

use Psr\Http\Client\ClientInterface;
use Yasminaai\Core\Client\RawClient;
use Yasminaai\Types\Policy;
use Yasminaai\Exceptions\YasminaaiException;
use Yasminaai\Exceptions\YasminaaiApiException;
use Yasminaai\Core\Json\JsonApiRequest;
use Yasminaai\Environments;
use Yasminaai\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Yasminaai\Policies\Requests\GetPoliciesRequest;
use Yasminaai\Core\Json\JsonDecoder;
use Yasminaai\Policies\Requests\PostPoliciesRequest;

class PoliciesClient
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
     * Show a specific policy
     *
     * @param int $carPolicy
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Policy
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function showPolicy(int $carPolicy, ?array $options = null): ?Policy
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "policies/{$carPolicy}",
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
                return Policy::fromJson($json);
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
     * Listing requested policies
     *
     * @param GetPoliciesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<Policy>
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function listPolicies(GetPoliciesRequest $request = new GetPoliciesRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->quoteRequestId != null) {
            $query['quote_request_id'] = $request->quoteRequestId;
        }
        if ($request->quotePriceId != null) {
            $query['quote_price_id'] = $request->quotePriceId;
        }
        if ($request->providerPolicyId != null) {
            $query['provider_policy_id'] = $request->providerPolicyId;
        }
        if ($request->carSequenceNumber != null) {
            $query['car_sequence_number'] = $request->carSequenceNumber;
        }
        if ($request->newOwnerId != null) {
            $query['new_owner_id'] = $request->newOwnerId;
        }
        if ($request->previousOwnerId != null) {
            $query['previous_owner_id'] = $request->previousOwnerId;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->minPrice != null) {
            $query['min_price'] = $request->minPrice;
        }
        if ($request->maxPrice != null) {
            $query['max_price'] = $request->maxPrice;
        }
        if ($request->perPage != null) {
            $query['per_page'] = $request->perPage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "policies",
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
                return JsonDecoder::decodeArray($json, [Policy::class]); // @phpstan-ignore-line
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
     * For issuing a new policy
     *
     * @param PostPoliciesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Policy
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function issuePolicy(PostPoliciesRequest $request, ?array $options = null): ?Policy
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "policies",
                    method: HttpMethod::POST,
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
                return Policy::fromJson($json);
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
