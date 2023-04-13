<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\UseCases\Gateway\Property;

use App\RealEstate\Discovering\Property\Entities\Property\AdvisorId;
use App\RealEstate\Discovering\Property\Entities\Property\Country;
use App\RealEstate\Discovering\Property\Entities\Property\PropertyId;

interface NewPropertyNotifierInterface
{
    public function synchronize(
        PropertyId $propertyId,
        AdvisorId $advisorId,
        Country $country
    ): void;
}
