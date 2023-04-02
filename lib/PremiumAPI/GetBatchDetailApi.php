<?php
/**
 * GetBatchDetailApi
 * PHP version 7.4
 *
 * @category Class
 * @package  VitexSoftware\Raiffeisenbank
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Sandbox
 *
 * Sandbox environment. Transaction overview (also for saving accounts). Payments import. Accounts list. Account balance.  Before making a call to Premium API, you need to register your app at our _Developer portal_. At _Developer Portal_ you obtain ClientID that your app must send in the request as `X-IBM-Client-Id`. These are your keys that grant your app access to the API. However, this is not enough, for a successful call your app needs to use mTLS. Thus, you not only need _https_ but also a client certificate issued by us. Each bank client/user can issue several certificates. Each certificate can permit different sets of operations (http methods) on different bank accounts. All this must be configured in Internet Banking first by each bank client/user (bank clients need to look under _Settings_ and do not forget to download the certificate at the last step). The certificate is downloaded in **PKCS#12** format as **\\*.p12** file and protected by a password chosen by the bank client/user. Yes, your app needs the password as well to get use of the **\\*p12** file for establishing mTLS connection to the bank.   Client certificates issued in Internet Banking for bank clients/users have limited validity (e.g. **5 years**). However, **each year** certificates are automatically blocked and bank client/user must unblock them in Internet Banking. It is possible to do it in advance and prolong the time before the certificate is blocked. Your app should be prepared for these scenarios and it should communicate such cases to your user in advance to provide seamless service and high user-experience of your app.  For testing purposes please download and use our <a href=\"assets/test_cert.p12\" download> test client certificate</a>. The certificate password is <i>test12345678</i>.  **Note**: Be aware, that in certain error situations, API can return different error structure along with broader set of http status codes, than the one defined below
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
use \VitexSoftware\Raiffeisenbank\ApiClient
use VitexSoftware\Raiffeisenbank\ApiException;
use VitexSoftware\Raiffeisenbank\Configuration;
use VitexSoftware\Raiffeisenbank\HeaderSelector;
use VitexSoftware\Raiffeisenbank\ObjectSerializer;

/**
 * GetBatchDetailApi Class Doc Comment
 *
 * @category Class
 * @package  VitexSoftware\Raiffeisenbank
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class GetBatchDetailApi
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
     * the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * 
     * @var string Description
     */
    protected $SUIPAddress = null;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getBatchDetail' => [
            'application/json',
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
        if(method_exists($this->client, 'getXIBMClientId')){
            $this->setXIBMClientId($this->client->getXIBMClientId());
        }
        if(method_exists($this->client, 'getpSUIPAddress')){
            $this->setSUIPAddress($this->client->getpSUIPAddress());
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
    public function setSUIPAddress($SUIPAddress) {
        $this->$SUIPAddress;
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
     * Operation getBatchDetail
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  int $batchFileId Batch file id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getBatchDetail'] to see the possible values for this operation
     *
     * @throws \VitexSoftware\Raiffeisenbank\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return object|object|object|object|object|object
     */
    public function getBatchDetail( $xRequestId, $batchFileId,  string $contentType = self::contentTypes['getBatchDetail'][0])
    {
        list($response) = $this->getBatchDetailWithHttpInfo( $xRequestId, $batchFileId, $contentType);
        return $response;
    }

    /**
     * Operation getBatchDetailWithHttpInfo
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  int $batchFileId Batch file id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getBatchDetail'] to see the possible values for this operation
     *
     * @throws \VitexSoftware\Raiffeisenbank\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of object|object|object|object|object|object, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBatchDetailWithHttpInfo( $xRequestId, $batchFileId,  string $contentType = self::contentTypes['getBatchDetail'][0])
    {
        $request = $this->getBatchDetailRequest( $xRequestId, $batchFileId, $contentType);

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

            switch($statusCode) {
                case 200:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'object';
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
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBatchDetailAsync
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  int $batchFileId Batch file id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getBatchDetail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBatchDetailAsync( $xRequestId, $batchFileId,  string $contentType = self::contentTypes['getBatchDetail'][0])
    {
        return $this->getBatchDetailAsyncWithHttpInfo( $xRequestId, $batchFileId, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBatchDetailAsyncWithHttpInfo
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  int $batchFileId Batch file id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getBatchDetail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBatchDetailAsyncWithHttpInfo( $xRequestId, $batchFileId,  string $contentType = self::contentTypes['getBatchDetail'][0])
    {
        $returnType = 'object';
        $request = $this->getBatchDetailRequest( $xRequestId, $batchFileId, $contentType);

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
     * Create request for operation 'getBatchDetail'
     *
     * @param  string $xRequestId Unique request id provided by consumer application for reference and auditing. (required)
     * @param  int $batchFileId Batch file id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getBatchDetail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getBatchDetailRequest( $xRequestId, $batchFileId,  string $contentType = self::contentTypes['getBatchDetail'][0])
    {
        $xIBMClientId = $this->getXIBMClientId();
        $pSUIPAddress = $this->SUIPAddress;
        
            
        // verify the required parameter 'xIBMClientId' is set
        if ($xIBMClientId === null || (is_array($xIBMClientId) && count($xIBMClientId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xIBMClientId when calling getBatchDetail'
            );
        }
            
        // verify the required parameter 'xRequestId' is set
        if ($xRequestId === null || (is_array($xRequestId) && count($xRequestId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xRequestId when calling getBatchDetail'
            );
        }
        if (strlen($xRequestId) > 60) {
            throw new \InvalidArgumentException('invalid length for "$xRequestId" when calling GetBatchDetailApi.getBatchDetail, must be smaller than or equal to 60.');
        }
        if (!preg_match("/[a-zA-Z0-9\\-_:]{1,60}/", $xRequestId)) {
            throw new \InvalidArgumentException("invalid value for \"xRequestId\" when calling GetBatchDetailApi.getBatchDetail, must conform to the pattern /[a-zA-Z0-9\\-_:]{1,60}/.");
        }
                    
        // verify the required parameter 'batchFileId' is set
        if ($batchFileId === null || (is_array($batchFileId) && count($batchFileId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batchFileId when calling getBatchDetail'
            );
        }
            
        if ($pSUIPAddress !== null && strlen($pSUIPAddress) > 39) {
            throw new \InvalidArgumentException('invalid length for "$pSUIPAddress" when calling GetBatchDetailApi.getBatchDetail, must be smaller than or equal to 39.');
        }
        

        $resourcePath = '/rbcz/premium/mock/payments/batches/{batchFileId}';
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

        // path params
        if ($batchFileId !== null) {
            $resourcePath = str_replace(
                '{' . 'batchFileId' . '}',
                ObjectSerializer::toPathValue($batchFileId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'GET',
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
