<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Domain\Repository;

use CHF\Bandsintown\Domain\Dto\EventFilter;
use TYPO3\CMS\Extbase\Persistence\Repository;

class EventRepository extends Repository
{
    /**
     * Find events matching the filter criteria.
     */
    public function findFilteredEvents(EventFilter $eventFilter, int $limit = 0)
    {
        $query = $this->createQuery();
        $constraints = [];

        // Filter date
        if ($eventFilter->getType() === 'upcoming') {
            $today = new \DateTime();
            $today->setTime(0, 0);
            $constraints[] = $query->greaterThanOrEqual('datetime', $today->format('Y-m-d H:i:s'));
        } elseif ($eventFilter->getType() === 'past') {
            $today = new \DateTime();
            $today->setTime(0, 0);
            $constraints[] = $query->lessThan('datetime', $today->format('Y-m-d H:i:s'));
        }

        // Filter artists
        $constraints[] = $query->in('artist', $eventFilter->getArtists());

        // Search string
        if (!empty($eventFilter->getSearchString())) {
            $searchConstraints = [];
            $searchConstraints[] = $query->like('description', '%' . $eventFilter->getSearchString() . '%');
            $searchConstraints[] = $query->like('venueName', '%' . $eventFilter->getSearchString() . '%');
            $searchConstraints[] = $query->like('venueCity', '%' . $eventFilter->getSearchString() . '%');
            $searchConstraints[] = $query->like('venueRegion', '%' . $eventFilter->getSearchString() . '%');
            $searchConstraints[] = $query->like('venueCountry', '%' . $eventFilter->getSearchString() . '%');

            $constraints[] = $query->logicalOr($searchConstraints);
        }

        // Apply filter
        $query->matching(
            $query->logicalAnd($constraints)
        );

        // Set ordering
        $query->setOrderings([
            $eventFilter->getOrderBy() => $eventFilter->getOrderDirection()
        ]);

        // Set limit
        if ($limit > 0) {
            $query->setLimit($limit);
        }

        return $query->execute();
    }
}
