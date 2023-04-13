<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property;

use App\RealEstate\Discovering\Property\Entities\Property\Exception\PropertyRulesViolationException;

final class Country
{
    public const FRANCE = 'france';
    public const PORTUGAL = 'portugal';
    public const DEUTSCH = 'deutschland';
    public const SPAIN = 'espana';
    public const ITALY = 'italia';

    private const ALLOWED = [
        self::FRANCE,
        self::PORTUGAL,
    ];

    private string $value;

    public function __construct(string $countryName)
    {
        if (false === in_array($countryName, self::ALLOWED, true)) {
            throw PropertyRulesViolationException::notImplementedCountry($countryName);
        }

        $this->value = $countryName;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function toString(): string
    {
        return $this->value;
    }
}
