<?php

/**
 * GetStatementsRequest
 *
 * PHP version 7.4
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

namespace VitexSoftware\Raiffeisenbank\Model;

use \ArrayAccess;
use \VitexSoftware\Raiffeisenbank\ObjectSerializer;

/**
 * GetStatementsRequest Class Doc Comment
 *
 * @category Class
 * @description Request values for list of a statements.
 * @package  VitexSoftware\Raiffeisenbank
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GetStatementsRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'getStatements_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accountNumber' => 'string',
        'currency' => 'string',
        'statementLine' => 'string',
        'dateFrom' => '\DateTime',
        'dateTo' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accountNumber' => null,
        'currency' => null,
        'statementLine' => null,
        'dateFrom' => 'date',
        'dateTo' => 'date'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'accountNumber' => false,
        'currency' => false,
        'statementLine' => false,
        'dateFrom' => false,
        'dateTo' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'accountNumber' => 'accountNumber',
        'currency' => 'currency',
        'statementLine' => 'statementLine',
        'dateFrom' => 'dateFrom',
        'dateTo' => 'dateTo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accountNumber' => 'setAccountNumber',
        'currency' => 'setCurrency',
        'statementLine' => 'setStatementLine',
        'dateFrom' => 'setDateFrom',
        'dateTo' => 'setDateTo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accountNumber' => 'getAccountNumber',
        'currency' => 'getCurrency',
        'statementLine' => 'getStatementLine',
        'dateFrom' => 'getDateFrom',
        'dateTo' => 'getDateTo'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const STATEMENT_LINE_MAIN = 'MAIN';
    public const STATEMENT_LINE_ADDITIONAL = 'ADDITIONAL';
    public const STATEMENT_LINE_MT940 = 'MT940';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatementLineAllowableValues()
    {
        return [
            self::STATEMENT_LINE_MAIN,
            self::STATEMENT_LINE_ADDITIONAL,
            self::STATEMENT_LINE_MT940,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('accountNumber', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('statementLine', $data ?? [], null);
        $this->setIfExists('dateFrom', $data ?? [], null);
        $this->setIfExists('dateTo', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatementLineAllowableValues();
        if (!is_null($this->container['statementLine']) && !in_array($this->container['statementLine'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'statementLine', must be one of '%s'",
                $this->container['statementLine'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets accountNumber
     *
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->container['accountNumber'];
    }

    /**
     * Sets accountNumber
     *
     * @param string|null $accountNumber accountNumber
     *
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        if (is_null($accountNumber)) {
            throw new \InvalidArgumentException('non-nullable accountNumber cannot be null');
        }
        $this->container['accountNumber'] = $accountNumber;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency Currency of the requested currency folder.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets statementLine
     *
     * @return string|null
     */
    public function getStatementLine()
    {
        return $this->container['statementLine'];
    }

    /**
     * Sets statementLine
     *
     * @param string|null $statementLine Statement line identification.
     *
     * @return self
     */
    public function setStatementLine($statementLine)
    {
        if (is_null($statementLine)) {
            throw new \InvalidArgumentException('non-nullable statementLine cannot be null');
        }
        $allowedValues = $this->getStatementLineAllowableValues();
        if (!in_array($statementLine, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'statementLine', must be one of '%s'",
                    $statementLine,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['statementLine'] = $statementLine;

        return $this;
    }

    /**
     * Gets dateFrom
     *
     * @return \DateTime|null
     */
    public function getDateFrom()
    {
        return $this->container['dateFrom'];
    }

    /**
     * Sets dateFrom
     *
     * @param \DateTime|null $dateFrom Date limit from.
     *
     * @return self
     */
    public function setDateFrom($dateFrom)
    {
        if (is_null($dateFrom)) {
            throw new \InvalidArgumentException('non-nullable dateFrom cannot be null');
        }
        $this->container['dateFrom'] = $dateFrom;

        return $this;
    }

    /**
     * Gets dateTo
     *
     * @return \DateTime|null
     */
    public function getDateTo()
    {
        return $this->container['dateTo'];
    }

    /**
     * Sets dateTo
     *
     * @param \DateTime|null $dateTo Date limit to.
     *
     * @return self
     */
    public function setDateTo($dateTo)
    {
        if (is_null($dateTo)) {
            throw new \InvalidArgumentException('non-nullable dateTo cannot be null');
        }
        $this->container['dateTo'] = $dateTo;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


