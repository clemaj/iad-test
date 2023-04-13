<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Adapters\Controller\Symfony\Command;

use App\RealEstate\Discovering\Property\Entities\Property\AdvisorId;
use App\RealEstate\Discovering\Property\Entities\Property\Country;
use App\RealEstate\Discovering\Property\Entities\Property\Exception\BusinessRulesViolationException;
use App\RealEstate\Discovering\Property\Entities\Property\PropertyId;
use App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor\AddPropertyForAdvisorPresenterInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CommandAddPropertyForAdvisorPresenter implements AddPropertyForAdvisorPresenterInterface
{
    private OutputInterface $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function show(
        PropertyId $propertyId,
        AdvisorId $advisorId,
        Country $country,
        int $priceInCents
    ): void {
        $this->output->writeln(
            sprintf(
                'Show : PropertyId[%s] | AdvisorId[%d] | Country[%s] | PriceInCents[%d]',
                $propertyId->toInt(),
                $advisorId->toInt(),
                $country->toString(),
                $priceInCents
            )
        );
    }

    public function showBusinessRulesViolations(BusinessRulesViolationException $exception): void
    {
        $this->output->writeln(
            sprintf(
                'Error : (%s, %s): %s',
                $exception->getPropertyPath(),
                $exception->getBusinessCode(),
                $exception->getTranslateMessage()
            )
        );
    }
}
