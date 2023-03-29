<?php
/**
 * UploadPaymentsApi
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
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

namespace OpenAPI\Client\RaiffeisenBank;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;

/**
 * UploadPaymentsApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
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
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
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
     * @param  string $x_ibm_client_id ClientID obtained from Developer Portal - when you registered your app with us. (required)
     * @param  string $x_request_id Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batch_import_format Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $request_body request_body (required)
     * @param  string $psu_ip_address IP address of a client - the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * @param  string $batch_name Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return object|\OpenAPI\Client\Model\ImportPayments400Response|\OpenAPI\Client\Model\GetBalance401Response|\OpenAPI\Client\Model\GetBalance403Response|\OpenAPI\Client\Model\ImportPayments413Response|\OpenAPI\Client\Model\ImportPayments415Response|\OpenAPI\Client\Model\GetBalance429Response|\OpenAPI\Client\Model\ImportPayments415Response
     */
    public function importPayments($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address = null, $batch_name = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        list($response) = $this->importPaymentsWithHttpInfo($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address, $batch_name, $contentType);
        return $response;
    }

    /**
     * Operation importPaymentsWithHttpInfo
     *
     * @param  string $x_ibm_client_id ClientID obtained from Developer Portal - when you registered your app with us. (required)
     * @param  string $x_request_id Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batch_import_format Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $request_body (required)
     * @param  string $psu_ip_address IP address of a client - the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * @param  string $batch_name Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of object|\OpenAPI\Client\Model\ImportPayments400Response|\OpenAPI\Client\Model\GetBalance401Response|\OpenAPI\Client\Model\GetBalance403Response|\OpenAPI\Client\Model\ImportPayments413Response|\OpenAPI\Client\Model\ImportPayments415Response|\OpenAPI\Client\Model\GetBalance429Response|\OpenAPI\Client\Model\ImportPayments415Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function importPaymentsWithHttpInfo($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address = null, $batch_name = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        $request = $this->importPaymentsRequest($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address, $batch_name, $contentType);

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
                    if ('\OpenAPI\Client\Model\ImportPayments400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ImportPayments400Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ImportPayments400Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetBalance401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetBalance401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetBalance401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPI\Client\Model\GetBalance403Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetBalance403Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetBalance403Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 413:
                    if ('\OpenAPI\Client\Model\ImportPayments413Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ImportPayments413Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ImportPayments413Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 415:
                    if ('\OpenAPI\Client\Model\ImportPayments415Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ImportPayments415Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ImportPayments415Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\OpenAPI\Client\Model\GetBalance429Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetBalance429Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetBalance429Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPI\Client\Model\ImportPayments415Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\ImportPayments415Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\ImportPayments415Response', []),
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
                        '\OpenAPI\Client\Model\ImportPayments400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetBalance401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetBalance403Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ImportPayments413Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ImportPayments415Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetBalance429Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\ImportPayments415Response',
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
     * @param  string $x_ibm_client_id ClientID obtained from Developer Portal - when you registered your app with us. (required)
     * @param  string $x_request_id Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batch_import_format Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $request_body (required)
     * @param  string $psu_ip_address IP address of a client - the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * @param  string $batch_name Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importPaymentsAsync($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address = null, $batch_name = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        return $this->importPaymentsAsyncWithHttpInfo($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address, $batch_name, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importPaymentsAsyncWithHttpInfo
     *
     * @param  string $x_ibm_client_id ClientID obtained from Developer Portal - when you registered your app with us. (required)
     * @param  string $x_request_id Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batch_import_format Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $request_body (required)
     * @param  string $psu_ip_address IP address of a client - the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * @param  string $batch_name Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importPaymentsAsyncWithHttpInfo($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address = null, $batch_name = null, string $contentType = self::contentTypes['importPayments'][0])
    {
        $returnType = 'object';
        $request = $this->importPaymentsRequest($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address, $batch_name, $contentType);

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
     * @param  string $x_ibm_client_id ClientID obtained from Developer Portal - when you registered your app with us. (required)
     * @param  string $x_request_id Unique request id provided by consumer application for reference and auditing. (required)
     * @param  string $batch_import_format Format of imported batch. For CCT format please use option SEPA-XML. (required)
     * @param  string $request_body (required)
     * @param  string $psu_ip_address IP address of a client - the end IP address of the client application (no server) in IPv4 or IPv6 format. If the bank client (your user) uses a browser by which he accesses your server app, we need to know the IP address of his browser. Always provide the closest IP address to the real end-user possible. (optional)
     * @param  string $batch_name Batch name, if not present then will be generated in format &#x60;ImportApi_&lt;DDMMYYYY&gt;&#x60;.  If the name is longer than 50 characters, it will be truncated (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['importPayments'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function importPaymentsRequest($x_ibm_client_id, $x_request_id, $batch_import_format, $request_body, $psu_ip_address = null, $batch_name = null, string $contentType = self::contentTypes['importPayments'][0])
    {

        // verify the required parameter 'x_ibm_client_id' is set
        if ($x_ibm_client_id === null || (is_array($x_ibm_client_id) && count($x_ibm_client_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_ibm_client_id when calling importPayments'
            );
        }

        // verify the required parameter 'x_request_id' is set
        if ($x_request_id === null || (is_array($x_request_id) && count($x_request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_request_id when calling importPayments'
            );
        }
        if (strlen($x_request_id) > 60) {
            throw new \InvalidArgumentException('invalid length for "$x_request_id" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 60.');
        }
        if (!preg_match("/[a-zA-Z0-9\\-_:]{1,60}/", $x_request_id)) {
            throw new \InvalidArgumentException("invalid value for \"x_request_id\" when calling UploadPaymentsApi.importPayments, must conform to the pattern /[a-zA-Z0-9\\-_:]{1,60}/.");
        }
        
        // verify the required parameter 'batch_import_format' is set
        if ($batch_import_format === null || (is_array($batch_import_format) && count($batch_import_format) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_import_format when calling importPayments'
            );
        }

        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling importPayments'
            );
        }

        if ($psu_ip_address !== null && strlen($psu_ip_address) > 39) {
            throw new \InvalidArgumentException('invalid length for "$psu_ip_address" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 39.');
        }
        
        if ($batch_name !== null && strlen($batch_name) > 50) {
            throw new \InvalidArgumentException('invalid length for "$batch_name" when calling UploadPaymentsApi.importPayments, must be smaller than or equal to 50.');
        }
        

        $resourcePath = '/rbcz/premium/mock/payments/batches';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_ibm_client_id !== null) {
            $headerParams['X-IBM-Client-Id'] = ObjectSerializer::toHeaderValue($x_ibm_client_id);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }
        // header params
        if ($psu_ip_address !== null) {
            $headerParams['PSU-IP-Address'] = ObjectSerializer::toHeaderValue($psu_ip_address);
        }
        // header params
        if ($batch_import_format !== null) {
            $headerParams['Batch-Import-Format'] = ObjectSerializer::toHeaderValue($batch_import_format);
        }
        // header params
        if ($batch_name !== null) {
            $headerParams['Batch-Name'] = ObjectSerializer::toHeaderValue($batch_name);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($request_body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
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
