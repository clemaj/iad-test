<?php

namespace App\RealEstate\Discovering\Property\Entities\Property\Exception;

use DomainException;
use Throwable;

class PropertyRulesViolationException extends DomainException
{
    public const CONTEXT = 'real_estate.property_violation.country';

    private string $businessCode;

    private string $propertyPath;

    public function __construct(string $businessCode, string $propertyPath, string $message, int $code = 422, Throwable $previous = null)
    {
        $this->businessCode = $businessCode;
        $this->propertyPath = $propertyPath;

        parent::__construct($message, $code, $previous);
    }

    public function getBusinessCode(): string
    {
        return $this->businessCode;
    }

    public function getPropertyPath(): string
    {
        return $this->propertyPath;
    }

    public function getTranslateMessage(): string
    {
        return sprintf('%s.%s', self::CONTEXT, $this->businessCode);
    }

    public static function notImplementedCountry(string $countryName)
    {
        throw new self(
            123,
            'App\Country',
            'Country not allowed or not implemented'
        );
    }
}