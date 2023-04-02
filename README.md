# Raiffeisenbank Premium API client library


 php client library for rbczpremiumapi 



## Installation & Usage


### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/VitexSoftware/php-vitexsoftware-rbczpremiumapi.git"
    }
  ],
  "require": {
    "VitexSoftware/php-vitexsoftware-rbczpremiumapi": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/Raiffeisenbank Premium API client library/vendor/autoload.php');
```

## Getting Started


Example environment or contents of [.env](examples/example.env) file for basic library configuration
```
CERT_FILE=examples/test_cert.p12
CERT_PASS=test12345678
XIBMCLIENTID=FbboLD2r1WHDRcuKS4wWUbSRHxlDloWL
API_DEBUG=True
```

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');





$apiInstance = new VitexSoftware\Raiffeisenbank\Api\DownloadStatementApi(
    // If you want use custom http client, pass your client which implements 
    // `GuzzleHttp\ClientInterface`.
    // This is optional, Internal `ApiClient` will be used as default.
    // Else you must call setXIBMClientId($lientID) and $this->setSUIPAddress($clientPubIP) 
    // methods to set API call properly      

    new \VitexSoftware\Raiffeisenbank\ApiClient(['clientpubip'=> \VitexSoftware\Raiffeisenbank\ApiClient::getPublicIP() ,'debug'=>true])
);


$xRequestId = 'xRequestId_example'; // string | Unique request id provided by consumer application for reference and auditing.
$acceptLanguage = 'acceptLanguage_example'; // string | The Accept-Language request HTTP header is used to determine document  language. Supported languages are `cs` and `en`.
$requestBody = new \VitexSoftware\Raiffeisenbank\Model\DownloadStatementRequest(); // \VitexSoftware\Raiffeisenbank\Model\DownloadStatementRequest

try {
    $result = $apiInstance->downloadStatement( $xRequestId, $acceptLanguage, $requestBody, $pSUIPAddress);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DownloadStatementApi->downloadStatement: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.rb.cz*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DownloadStatementApi* | [**downloadStatement**](docs/Api/DownloadStatementApi.md#downloadstatement) | **POST** /rbcz/premium/api/accounts/statements/download | 
*GetAccountBalanceApi* | [**getBalance**](docs/Api/GetAccountBalanceApi.md#getbalance) | **GET** /rbcz/premium/api/accounts/{accountNumber}/balance | 
*GetAccountsApi* | [**getAccounts**](docs/Api/GetAccountsApi.md#getaccounts) | **GET** /rbcz/premium/api/accounts | 
*GetBatchDetailApi* | [**getBatchDetail**](docs/Api/GetBatchDetailApi.md#getbatchdetail) | **GET** /rbcz/premium/api/payments/batches/{batchFileId} | 
*GetStatementListApi* | [**getStatements**](docs/Api/GetStatementListApi.md#getstatements) | **POST** /rbcz/premium/api/accounts/statements | 
*GetTransactionListApi* | [**getTransactionList**](docs/Api/GetTransactionListApi.md#gettransactionlist) | **GET** /rbcz/premium/api/accounts/{accountNumber}/{currencyCode}/transactions | 
*UploadPaymentsApi* | [**importPayments**](docs/Api/UploadPaymentsApi.md#importpayments) | **POST** /rbcz/premium/api/payments/batches | 

## Models

- [DownloadStatementRequest](docs/Model/DownloadStatementRequest.md)
- [GetBalance200Response](docs/Model/GetBalance200Response.md)
- [GetBalance200ResponseCurrencyFoldersInner](docs/Model/GetBalance200ResponseCurrencyFoldersInner.md)
- [GetBalance200ResponseCurrencyFoldersInnerBalancesInner](docs/Model/GetBalance200ResponseCurrencyFoldersInnerBalancesInner.md)
- [GetBalance401Response](docs/Model/GetBalance401Response.md)
- [GetBalance403Response](docs/Model/GetBalance403Response.md)
- [GetBalance404Response](docs/Model/GetBalance404Response.md)
- [GetBalance429Response](docs/Model/GetBalance429Response.md)
- [GetStatementsRequest](docs/Model/GetStatementsRequest.md)
- [ImportPayments400Response](docs/Model/ImportPayments400Response.md)
- [ImportPayments413Response](docs/Model/ImportPayments413Response.md)
- [ImportPayments415Response](docs/Model/ImportPayments415Response.md)

## Authorization
All endpoints do not require authorization.
## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

info@vitexsoftware.cz

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.1.20230222`
    - Package version: `0.1.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
