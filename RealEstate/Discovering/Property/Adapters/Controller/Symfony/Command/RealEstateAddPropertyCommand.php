<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Adapters\Controller\Symfony\Command;

use App\RealEstate\Discovering\Property\Entities\Property\PropertyRepositoryInterface;
use App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor\AddPropertyForAdvisor;
use App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor\AddPropertyForAdvisorRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class RealEstateAddPropertyCommand extends Command
{
    protected static string $propertyIdArg = 'property-id';
    protected static string $advisorIdArg = 'advisor-id';

    protected static $defaultName = 'real-estate:add-property';

    private AddPropertyForAdvisor $useCase;

    private PropertyRepositoryInterface $propertyRepository;

    public function __construct(
        AddPropertyForAdvisor $useCase,
        PropertyRepositoryInterface $propertyRepository
    ) {
        parent::__construct();
        $this->useCase = $useCase;
        $this->propertyRepository = $propertyRepository;
    }

    public function configure(): void
    {
        $this
            ->setHelp('This command will help add a property for one advisor')
            ->addArgument(self::$propertyIdArg,InputArgument::REQUIRED, 'Property ID')
            ->addArgument(self::$advisorIdArg,InputArgument::REQUIRED, 'Advisor ID')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $property = $this->propertyRepository->get(
            (int)$input->getArgument(self::$propertyIdArg),
            (int)$input->getArgument(self::$advisorIdArg)
        );

        $presenter = new CommandAddPropertyForAdvisorPresenter($output);
        $this->useCase->execute(
            new AddPropertyForAdvisorRequest(
                $property->getUid()->toInt(),
                $property->getAdvisorId()->toInt(),
                $property->getUrl(),
                $property->getPrice()
            ),
            $presenter
        );

        return Command::SUCCESS;
    }
}
