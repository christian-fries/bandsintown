<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Service;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ImportService implements SingletonInterface
{
    /**
     * @var string
     */
    protected $applicationId;

    /**
     * @var int
     */
    protected $storagePid;

    /**
     * @param int $storagePid
     * @param string $applicationId
     */
    public function importEvents(int $storagePid, string $applicationId): void
    {
        $this->applicationId = $applicationId;
        $this->storagePid = $storagePid;
        $data = [];
        $idCounter = 0;

        $artists = $this->getArtists();

        foreach ($artists as $artist) {
            $eventDataCollection = $this->requestEventDataForArtist($artist['name']);

            foreach ($eventDataCollection as $eventData) {
                $eventId = (int)($eventData['id']);
                $event = $this->prepareEventData($eventData, $artist['uid']);

                $existingEvent = $this->findEvent($eventId);

                if (null === $existingEvent) {
                    $data['tx_bandsintown_domain_model_event']['NEW' . $idCounter++] = $event;
                } else {
                    $data['tx_bandsintown_domain_model_event'][$existingEvent['uid']] = $event;
                }
            }
        }

        /** @var DataHandler $dataHandler */
        $dataHandler = GeneralUtility::makeInstance(DataHandler::class);
        $dataHandler->start($data, []);
        $dataHandler->process_datamap();
    }

    protected function getArtists(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_bandsintown_domain_model_artist');

        return $queryBuilder
            ->select('*')
            ->from('tx_bandsintown_domain_model_artist')
            ->where(
                $queryBuilder->expr()->eq('pid', $this->storagePid)
            )
            ->execute()
            ->fetchAll();
    }

    protected function findEvent(int $eventId): ?array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_bandsintown_domain_model_event');

        $event = $queryBuilder
            ->select('uid')
            ->from('tx_bandsintown_domain_model_event')
            ->where(
                $queryBuilder->expr()->eq('id', $eventId)
            )
            ->execute()
            ->fetch();

        return $event === false ? null : $event;
    }

    /**
     * Request event data from bandsintown.
     */
    protected function requestEventDataForArtist(string $artist): array
    {
        $requestFactory = GeneralUtility::makeInstance(RequestFactory::class);
        $url = 'https://rest.bandsintown.com/artists/' . urlencode($artist) . '/events?app_id=' . urlencode($this->applicationId) . '&date=all';
        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false
        ];
        $response = $requestFactory->request($url, 'GET', $additionalOptions);

        $data = [];

        if ($response->getStatusCode() === 200) {
            if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
                $data = json_decode($response->getBody()->getContents(), true);
            }
        }

        return $data;
    }

    protected function prepareEventData(array $eventData, int $artistUid): array
    {
        $event['pid'] = $this->storagePid;
        $event['id'] = $eventData['id'];
        $event['url'] = $eventData['url'];

        if (!empty($eventData['on_sale_datetime'])) {
            $event['on_sale_datetime'] = $eventData['on_sale_datetime'];
        }

        $event['datetime'] = $eventData['datetime'];
        $event['title'] = $eventData['title'];
        $event['description'] = $eventData['description'];
        $event['lineup'] = json_encode($eventData['lineup']);
        $event['venue_name'] = $eventData['venue']['name'];
        $event['venue_city'] = $eventData['venue']['city'];
        $event['venue_region'] = $eventData['venue']['region'];
        $event['venue_country'] = $eventData['venue']['country'];
        $event['venue_latitude'] = $eventData['venue']['latitude'];
        $event['venue_longitude'] = $eventData['venue']['longitude'];

        if (!empty($eventData['offers'])) {
            $event['offer_type'] = $eventData['offers'][0]['type'];
            $event['offer_url'] = $eventData['offers'][0]['url'];
            $event['offer_status'] = $eventData['offers'][0]['status'];
        }

        $event['artist'] = $artistUid;

        return $event;
    }
}
