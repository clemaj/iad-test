<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor;

use App\RealEstate\Discovering\Property\Entities\Property\AdvisorId;
use App\RealEstate\Discovering\Property\Entities\Property\Country;
use App\RealEstate\Discovering\Property\Entities\Property\Exception\BusinessRulesViolationException;
use App\RealEstate\Discovering\Property\Entities\Property\PropertyId;

interface AddPropertyForAdvisorPresenterInterface
{
    public function show(
        PropertyId $propertyId,
        AdvisorId $advisorId,
        Country $country,
        int $priceInCents
    ): void;

    public function showBusinessRulesViolations(BusinessRulesViolationException $exception): void;
}
