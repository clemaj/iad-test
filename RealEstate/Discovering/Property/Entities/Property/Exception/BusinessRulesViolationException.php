<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property\Exception;

use DomainException;
use Throwable;

class BusinessRulesViolationException extends DomainException
{
    public const CONTEXT = 'real_estate.business_rules_violation.property';

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
}
