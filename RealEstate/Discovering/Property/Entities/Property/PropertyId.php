<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property;

use Webmozart\Assert\Assert;

final class PropertyId
{
    private int $value;

    public function __construct(int $value)
    {
        Assert::uuid($value);
        $this->value = $value;
    }

    public static function fromInt(int $value): self
    {
        return new self($value);
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
