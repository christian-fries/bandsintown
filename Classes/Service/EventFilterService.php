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
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\SingletonInterface;

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
                'all' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.all'),
                'upcoming' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.upcoming'),
                'past' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.type.past'),
            ],
            'orderBy' => [
                'datetime' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderBy.datetime'),
                'crdate' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderBy.crdate'),
            ],
            'orderDirection' => [
                'ASC' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderDirection.ASC'),
                'DESC' => $this->getLanguageService()->sL('LLL:EXT:bandsintown/Resources/Private/Language/locallang.xlf:filter.orderDirection.DESC'),
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

    private function getLanguageService(): LanguageService
    {
        return $GLOBALS['LANG'];
    }
}
