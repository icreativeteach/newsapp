<?php

declare(strict_types=1);

namespace Vin\ShopwareSdk\Client;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\ClientTrait as GuzzleClientTrait;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Psr\Http\Message\UriInterface;

class Client implements ClientInterface
{
    use GuzzleClientTrait;

    private GuzzleClientInterface $guzzleClient;

    private function __construct(GuzzleClientInterface $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    public static function create(array $config = []): self
    {
        $handlerStack = HandlerStack::create(new CurlHandler());
        $handlerStack->push(Middleware::retry(function (
            $retries,
            RequestInterface $request,
            ?Response $response = null,
            ?TransferException $exception = null
        ) use ($config) {
            $config = array_key_exists('max_attempt', $config) ? $config : ['max_attempt' => 3];

            // Limit the number of retries to 5
            if ($retries >= $config['max_attempt']) {
                return false;
            }

            // Retry connection exceptions
            if ($exception instanceof ConnectException) {
                return true;
            }

            if ($response && $response->getStatusCode() >= 500) {
                // Retry on server errors
                return true;
            }

            return false;
        }, function ($numberOfRetries) use ($config) {
            $config = array_key_exists('sec_before_attempt', $config) ? $config : ['sec_before_attempt' => 2];

            return $config['sec_before_attempt'] * 1000 * $numberOfRetries;
        }));

        $client =  new GuzzleClient(array_merge([
            'handler' => $handlerStack,
        ], $config));

        return new self($client);
    }

    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->guzzleClient->send($request, $options);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $options[RequestOptions::SYNCHRONOUS] = true;
        $options[RequestOptions::ALLOW_REDIRECTS] = false;
        $options[RequestOptions::HTTP_ERRORS] = false;

        return $this->sendAsync($request, $options)->wait();
    }

    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->guzzleClient->sendAsync($request, $options);
    }

    /**
     * Create and send an HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string              $method  HTTP method.
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     *
     * @throws GuzzleException
     */
    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->guzzleClient->request($method, $uri, $options);
    }

    /**
     * Create and send an asynchronous HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well. Use an array to provide a URL
     * template and additional variables to use in the URL template expansion.
     *
     * @param string              $method  HTTP method
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     */
    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->guzzleClient->requestAsync($method, $uri, $options);
    }

    public function get(string $uri, array $options = []): ResponseInterface
    {
        return $this->request('GET', $uri, $options);
    }

    public function post(string $uri, array $options = []): ResponseInterface
    {
        return $this->request('POST', $uri, $options);
    }

    public function put(string $uri, array $options = []): ResponseInterface
    {
        return $this->request('PUT', $uri, $options);
    }

    public function patch(string $uri, array $options = []): ResponseInterface
    {
        return $this->request('PATCH', $uri, $options);
    }

    public function delete(string $uri, array $options = []): ResponseInterface
    {
        return $this->request('DELETE', $uri, $options);
    }
}
