<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Service;

use CHF\Bandsintown\Domain\Dto\EventFilter;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class EventFilterService implements SingletonInterface
{
    public function createFilterObjectBasedOnFlexform(array $settings): EventFilter
    {
        $eventFilter = new EventFilter();
        $eventFilter->setArtists(explode(',', $settings['artists']));
        $eventFilter->setType($settings['type']);
        $eventFilter->setOrderBy($settings['orderBy']);
        $eventFilter->setOrderDirection($settings['orderDirection']);

        return $eventFilter;
    }

    public function getFilterOptions(): array
    {
        return [
            'type' => [
                'all' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.all'),
                'upcoming' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.upcoming'),
                'past' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.past'),
            ],
            'orderBy' => [
                'datetime' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderBy.datetime'),
                'crdate' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderBy.crdate'),
            ],
            'orderDirection' => [
                'ASC' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderDirection.ASC'),
                'DESC' => LocalizationUtility::translate('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderDirection.DESC'),
            ]
        ];
    }

    public function getOrderByOptions(): array
    {
        return [
            'datetime' => 'DateTime',
            'crdate' => 'CrDate'
        ];
    }
}
