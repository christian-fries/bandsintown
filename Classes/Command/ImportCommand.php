<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Command;

use CHF\Bandsintown\Service\ImportService;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class ImportCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('Import events from Bandsintown')
            ->addArgument(
                'storagePid',
                InputArgument::REQUIRED
            )->setHelp(
                'This command imports events and artist data from Bandsintown to your TYPO3 CMS. The data is stored at the provided storage pid.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title($this->getDescription());

        $applicationId = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('bandsintown', 'applicationId');

        if (empty($applicationId)) {
            $io->error('You need to provide an Application ID in the extension settings.');
            return 1592148638;
        }

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $importService = $objectManager->get(ImportService::class);
        $storagePid = (int)$input->getArgument('storagePid');

        try {
            $importService->importEvents($storagePid, $applicationId);
        } catch (ClientException $e) {
            if (403 === $e->getResponse()->getStatusCode()) {
                $io->error('The Application ID you provided is not valid. Configure a valid Application ID in the extension settings.');
                return 1592148926;
            }
            $io->error($e->getMessage());
            return 1592149135;
        }

        $io->writeln('Events from Bandsintown imported successfully.');

        return 0;
    }
}
