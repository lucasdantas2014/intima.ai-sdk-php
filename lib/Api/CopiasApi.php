<?php
/**
 * CopiasApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Intima.ai - API
 *
 * Bem vindo a documentação da API do [Intima.ai](https://app.intima.ai). Está documentação cobre todas as ações disponíveis dentro do Intima.ai e as disponibilizam como `ENDPOINTS` que podem ser integrados e utilizados por outros serviços ou aplicações, bastando somente possuir o `Token de acesso da API`.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * CopiasApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CopiasApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createProcessCopy
     *
     * Realiza uma nova cópia processual
     *
     * @param  string $processo processo (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array
     */
    public function createProcessCopy($processo, $pje_auth_id)
    {
        return $this->createProcessCopyWithHttpInfo($processo, $pje_auth_id);
    }

    /**
     * Operation createProcessCopyWithHttpInfo
     *
     * Realiza uma nova cópia processual
     *
     * @param  string $processo (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function createProcessCopyWithHttpInfo($processo, $pje_auth_id)
    {
        $returnType = '';
        $request = $this->createProcessCopyRequest($processo, $pje_auth_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return ['status_code' => $statusCode, 'data' => $response->getBody()->getContents()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation createProcessCopyAsync
     *
     * Realiza uma nova cópia processual
     *
     * @param  string $processo (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProcessCopyAsync($processo, $pje_auth_id)
    {
        return $this->createProcessCopyAsyncWithHttpInfo($processo, $pje_auth_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createProcessCopyAsyncWithHttpInfo
     *
     * Realiza uma nova cópia processual
     *
     * @param  string $processo (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createProcessCopyAsyncWithHttpInfo($processo, $pje_auth_id)
    {
        $returnType = '';
        $request = $this->createProcessCopyRequest($processo, $pje_auth_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createProcessCopy'
     *
     * @param  string $processo (required)
     * @param  int $pje_auth_id é o id referente ao tribunal cadastrado em \&quot;Tribunais ativos\&quot; no Intima.ai (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createProcessCopyRequest($processo, $pje_auth_id)
    {
        // verify the required parameter 'processo' is set
        if ($processo === null || (is_array($processo) && count($processo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $processo when calling createProcessCopy'
            );
        }
        // verify the required parameter 'pje_auth_id' is set
        if ($pje_auth_id === null || (is_array($pje_auth_id) && count($pje_auth_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pje_auth_id when calling createProcessCopy'
            );
        }

        $resourcePath = '/actions/processos/copy/{pje_auth_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($pje_auth_id !== null) {
            $resourcePath = str_replace(
                '{' . 'pje_auth_id' . '}',
                ObjectSerializer::toPathValue($pje_auth_id),
                $resourcePath
            );
        }

        // form params
        if ($processo !== null) {
            $formParams['processo'] = ObjectSerializer::toFormValue($processo);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('api_token');
        if ($apiKey !== null) {
            $queryParams['api_token'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}