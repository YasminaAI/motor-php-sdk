<?php

namespace Yasminaai\OtPs;

use Psr\Http\Client\ClientInterface;
use Yasminaai\Core\Client\RawClient;
use Yasminaai\OtPs\Requests\PostQuoteOtpRequest;
use Yasminaai\Exceptions\YasminaaiException;
use Yasminaai\Exceptions\YasminaaiApiException;
use Yasminaai\Core\Json\JsonApiRequest;
use Yasminaai\Environments;
use Yasminaai\Core\Client\HttpMethod;
use Psr\Http\Client\ClientExceptionInterface;
use Yasminaai\OtPs\Requests\PostIssueOtpRequest;

class OtPsClient
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
     * This endpoint sends a one-time password (OTP) to the provided email and phone number for quote verification. It should be called before creating a quote request.
     *
     * @param PostQuoteOtpRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function requestOtpForQuoteVerification(PostQuoteOtpRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "quote-otp",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * This endpoint sends a one-time password (OTP). It should be called before issuing a policy.
     *
     * @param PostIssueOtpRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws YasminaaiException
     * @throws YasminaaiApiException
     */
    public function requestOtpForIssuingPolicy(PostIssueOtpRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Sandbox->value,
                    path: "issue-otp",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
