<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property;

use DateTime;

final class PropertyRepository implements PropertyRepositoryInterface
{
    public function get(int $uid, int $advisorId): ?Property
    {
        return Property::new(
            new Country(Country::FRANCE),
            new PropertyId($uid),
            new AdvisorId($advisorId),
            'https://iad.fr/',
            100000,
            new DateTime()

        );
    }

    public function add(Property $property): void
    {
        // Add
    }
}