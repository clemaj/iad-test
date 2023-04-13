<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor;

use App\RealEstate\Discovering\Property\Entities\Property\AdvisorId;
use App\RealEstate\Discovering\Property\Entities\Property\Country;
use App\RealEstate\Discovering\Property\Entities\Property\Exception\BusinessRulesViolationException;
use App\RealEstate\Discovering\Property\Entities\Property\Property;
use App\RealEstate\Discovering\Property\Entities\Property\PropertyId;
use App\RealEstate\Discovering\Property\Entities\Property\PropertyRepositoryInterface;
use App\RealEstate\Discovering\Property\UseCases\Gateway\Property\NewPropertyNotifierInterface;
use DateTime;

class AddPropertyForAdvisor
{
    private PropertyRepositoryInterface $propertyRepository;

    private NewPropertyNotifierInterface $newPropertyNotifier;

    public function __construct(PropertyRepositoryInterface $propertyRepository, NewPropertyNotifierInterface $newPropertyNotifier)
    {
        $this->propertyRepository = $propertyRepository;
        $this->newPropertyNotifier = $newPropertyNotifier;
    }

    public function execute(AddPropertyForAdvisorRequest $request, AddPropertyForAdvisorPresenterInterface $presenter): void
    {
        try {
            $country = Country::fromString(Country::FRANCE);
            $propertyId = PropertyId::fromInt($request->getUid());
            $advisorId = AdvisorId::fromInt($request->getAdvisorId());

            $object = Property::new(
                $country,
                $propertyId,
                $advisorId,
                $request->getUrl(),
                $request->getPrice(),
                new DateTime()
            );

            $this->propertyRepository->add($object);

            $this->newPropertyNotifier->synchronize(
                $propertyId,
                $advisorId,
                $country
            );

            $presenter->show(
                $propertyId,
                $advisorId,
                $country,
                (int) ($object->getPrice() * 100)
            );
        } catch (BusinessRulesViolationException $exception) {
            $presenter->showBusinessRulesViolations($exception);
        }
    }
}
