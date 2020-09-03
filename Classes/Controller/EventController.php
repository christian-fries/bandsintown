<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Controller;

use CHF\Bandsintown\Domain\Dto\EventFilter;
use CHF\Bandsintown\Domain\Model\Event;
use CHF\Bandsintown\Domain\Repository\ArtistRepository;
use CHF\Bandsintown\Domain\Repository\EventRepository;
use CHF\Bandsintown\Service\EventFilterService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class EventController extends ActionController
{
    /**
     * @var ArtistRepository
     */
    protected $artistRepository;

    /**
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * @var EventFilterService
     */
    protected $eventFilterService;

    public function __construct(ArtistRepository $artistRepository, EventRepository $eventRepository, EventFilterService $eventFilterService)
    {
        $this->artistRepository = $artistRepository;
        $this->eventRepository = $eventRepository;
        $this->eventFilterService = $eventFilterService;
    }

    public function listAction()
    {
        $filter = $this->eventFilterService->createFilterObjectBasedOnFlexform($this->settings);

        $this->view->assignMultiple([
            'events' => $this->eventRepository->findFilteredEvents($filter, (int)$this->settings['limit']),
            'filter' => $filter,
            'artists' => $this->artistRepository->findAll(),
            'filterOptions' => $this->eventFilterService->getFilterOptions(),
        ]);
    }

    public function filteredListAction(EventFilter $filter = null)
    {
        if (null === $filter || (int)$this->settings['enableFiltering'] !== 1) {
            $filter = $this->eventFilterService->createFilterObjectBasedOnFlexform($this->settings);
        }

        $this->view->assignMultiple([
            'events' => $this->eventRepository->findFilteredEvents($filter, (int)$this->settings['limit']),
            'filter' => $filter,
            'artists' => $this->artistRepository->findAll(),
            'filterOptions' => $this->eventFilterService->getFilterOptions(),
        ]);
    }

    public function showAction(Event $event)
    {
        $this->view->assign('event', $event);
    }
}
