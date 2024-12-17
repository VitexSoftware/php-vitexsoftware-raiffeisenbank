<?php

/**
 * UploadPaymentsApi
 * PHP version 7.4+
 *
 * @category Class
 * @package  VitexSoftware\Raiffeisenbank
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Production
 *
 * Transaction overview (also for saving accounts). Payments import. Accounts list. Account balance.  Before making a call to Premium API, you need to register your app at our _Developer portal_. At _Developer Portal_ you obtain ClientID that your app must send in the request as `X-IBM-Client-Id`. These are your keys that grant your app access to the API. However, this is not enough, for a successful call your app needs to use mTLS. Thus, you not only need _https_ but also a client certificate issued by us. Each bank client/user can issue several certificates. Each certificate can permit different sets of operations (http methods) on different bank accounts. All this must be configured in Internet Banking first by each bank client/user (bank clients need to look under _Settings_ and do not forget to download the certificate at the last step). The certificate is downloaded in **PKCS#12** format as **\\*.p12** file and protected by a password chosen by the bank client/user. Yes, your app needs the password as well to get use of the **\\*p12** file for establishing mTLS connection to the bank.   Client certificates issued in Internet Banking for bank clients/users have limited validity (e.g. **5 years**). However, **each year** certificates are automatically blocked and bank client/user must unblock them in Internet Banking. It is possible to do it in advance and prolong the time before the certificate is blocked. Your app should be prepared for these scenarios and it should communicate such cases to your user in advance to provide seamless service and high user-experience of your app.  **Note**: Be aware, that in certain error situations, API can return different error structure along with broader set of http status codes, than the one defined below
 *
 * The version of the OpenAPI document: 1.1.20230222
 * Contact: info@vitexsoftware.cz
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace VitexSoftware\Raiffeisenbank\PremiumAPI;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use VitexSoftware\Raiffeisenbank\ApiClient;
use VitexSoftware\Raiffeisenbank\ApiException;
use VitexSoftware\Raiffeisenbank\Configuration;
use VitexSoftware\Raiffeisenbank\HeaderSelector;
use VitexSoftware\Raiffeisenbank\ObjectSerializer;

/**
 * UploadPaymentsApi Class Doc Comment
 *
 * @category Class
 * @package  VitexSoftware\Raiffeisenbank
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class UploadPaymentsApi
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
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * ClientID obtained from Developer Portal - when you registered your app with us.
     * @var string
     */
    protected $xIBMClientId = null;

    /**
     * Use the /rbcz/premium/mock/* path for endpoints ?
     */
    protected $mockMode = false;

    /**
     * the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     *
     * @var string Description
     */
    protected $SUIPAddress = null;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'importPayments' => [
            'text/plain',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new ApiClient();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
        if (method_exists($this->client, 'getXIBMClientId')) {
            $this->setXIBMClientId($this->client->getXIBMClientId());
        }
        if (method_exists($this->client, 'getpSUIPAddress')) {
            $this->setSUIPAddress($this->client->getpSUIPAddress());
        }
        if (method_exists($this->client, 'getMockMode')) {
            $this->setMockMode($this->client->getMockMode());
        }
    }

    /**
     * Keep ClientID obtained from Developer Portal
     *
     * @param string $clientId Description
     *
     * @return string
     */
    public function setXIBMClientId($clientId)
    {
        return $this->xIBMClientId = $clientId;
    }

    /**
     * Give you ClientID obtained from Developer Portal
     *
     * @return string
     */
    public function getXIBMClientId()
    {
        return $this->xIBMClientId;
    }

    /**
     * @param  string $SUIPAddress IP address of a client
     */
    public function setSUIPAddress($SUIPAddress)
    {
        $this->SUIPAddress;
    }

    /**
     * @param boolean $mocking Use mocking api for development purposes ?
     */
    public function setMockMode($mocking)
    {
        $this->mockMode = $mocking;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation importPayments
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batchImportFormat Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $requestBody requestBody (required)
     * @param  string $batchName Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \VitexSoftware\Raiffeisenbank\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return object|\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response
     */
    public function importPayments($xRequestId, $batchImportFormat, $requestBody, $batchName = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        list($response) = $this->importPaymentsWithHttpInfo($xRequestId, $batchImportFormat, $requestBody, $batchName, $contentType);
        return $response;
    }

    /**
     * Operation importPaymentsWithHttpInfo
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batchImportFormat Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $requestBody (required)
     * @param  string $batchName Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \VitexSoftware\Raiffeisenbank\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of object|\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response|\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response|\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function importPaymentsWithHttpInfo($xRequestId, $batchImportFormat, $requestBody, $batchName = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        $request = $this->importPaymentsRequest($xRequestId, $batchImportFormat, $requestBody, $batchName, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch ($statusCode) {
                case 200:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 413:
                    if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 415:
                    if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            $returnType = 'object';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\ImportPayments400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\GetBalance401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\GetBalance403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\ImportPayments413Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\GetBalance429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VitexSoftware\Raiffeisenbank\Model\ImportPayments415Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation importPaymentsAsync
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batchImportFormat Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $requestBody (required)
     * @param  string $batchName Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importPaymentsAsync($xRequestId, $batchImportFormat, $requestBody, $batchName = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        return $this->importPaymentsAsyncWithHttpInfo($xRequestId, $batchImportFormat, $requestBody, $batchName, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importPaymentsAsyncWithHttpInfo
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batchImportFormat Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $requestBody (required)
     * @param  string $batchName Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importPaymentsAsyncWithHttpInfo($xRequestId, $batchImportFormat, $requestBody, $batchName = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        $returnType = 'object';
        $request = $this->importPaymentsRequest($xRequestId, $batchImportFormat, $requestBody, $batchName, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importPayments'
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batchImportFormat Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $requestBody (required)
     * @param  string $batchName Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function importPaymentsRequest($xRequestId, $batchImportFormat, $requestBody, $batchName = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        $xIBMClientId = $this->getXIBMClientId();
        $pSUIPAddress = $this->SUIPAddress;


        // verify the required parameter 'xIBMClientId' is set
        if ($xIBMClientId === null || (is_array($xIBMClientId) && count($xIBMClientId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xIBMClientId when calling importPayments'
            );
        }

        // verify the required parameter 'xRequestId' is set
        if ($xRequestId === null || (is_array($xRequestId) && count($xRequestId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xRequestId when calling importPayments'
            );
        }
        if (strlen($xRequestId) > 60) {
            throw new \InvalidArgumentException('invalid length for "$xRequestId" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 60.');
        }
        if (!preg_match("/[a-zA-Z0-9\\-_:]{1,60}/", $xRequestId)) {
            throw new \InvalidArgumentException("invalid value for \"xRequestId\" when calling UploadPaymentsApi.importPayments, must conform to the pattern /[a-zA-Z0-9\\-_:]{1,60}/.");
        }

        // verify the required parameter 'batchImportFormat' is set
        if ($batchImportFormat === null || (is_array($batchImportFormat) && count($batchImportFormat) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batchImportFormat when calling importPayments'
            );
        }

        // verify the required parameter 'requestBody' is set
        if ($requestBody === null || (is_array($requestBody) && count($requestBody) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $requestBody when calling importPayments'
            );
        }

        if ($pSUIPAddress !== null && strlen($pSUIPAddress) > 39) {
            throw new \InvalidArgumentException('invalid length for "$pSUIPAddress" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 39.');
        }

        if ($batchName !== null && strlen($batchName) > 50) {
            throw new \InvalidArgumentException('invalid length for "$batchName" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 50.');
        }


        $resourcePath = '/rbcz/premium/api/payments/batches';
        if ($this->mockMode === true) {
            $resourcePath = str_replace('/rbcz/premium/api/', '/rbcz/premium/mock/', $resourcePath);
        }
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($xIBMClientId !== null) {
            $headerParams['X-IBM-Client-Id'] = ObjectSerializer::toHeaderValue($xIBMClientId);
        }
        // header params
        if ($xRequestId !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($xRequestId);
        }
        // header params
        if ($pSUIPAddress !== null) {
            $headerParams['PSU-IP-Address'] = ObjectSerializer::toHeaderValue($pSUIPAddress);
        }
        // header params
        if ($batchImportFormat !== null) {
            $headerParams['Batch-Import-Format'] = ObjectSerializer::toHeaderValue($batchImportFormat);
        }
        // header params
        if ($batchName !== null) {
            $headerParams['Batch-Name'] = ObjectSerializer::toHeaderValue($batchName);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($requestBody)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($requestBody));
            } else {
                $httpBody = $requestBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
