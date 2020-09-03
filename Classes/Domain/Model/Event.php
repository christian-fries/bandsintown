<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Event extends AbstractEntity
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $onSaleDatetime;

    /**
     * @var \DateTime
     */
    protected $datetime;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $lineup;

    /**
     * @var string
     */
    protected $venueName;

    /**
     * @var string
     */
    protected $venueCity;

    /**
     * @var string
     */
    protected $venueRegion;

    /**
     * @var string
     */
    protected $venueCountry;

    /**
     * @var string
     */
    protected $venueLatitude;

    /**
     * @var string
     */
    protected $venueLongitude;

    /**
     * @var string
     */
    protected $offerType;

    /**
     * @var string
     */
    protected $offerUrl;

    /**
     * @var string
     */
    protected $offerStatus;

    /**
     * @var Artist
     */
    protected $artist;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getOnSaleDatetime(): ?\DateTime
    {
        return $this->onSaleDatetime;
    }

    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLineup(): string
    {
        return implode(', ', $this->getLineupData());
    }

    public function getLineupData(): array
    {
        return json_decode($this->lineup, true);
    }

    public function getVenue(): string
    {
        $venueParts = [];

        if (!empty($this->getVenueName())) {
            $venueParts[] = $this->getVenueName();
        }

        if (!empty($this->getVenueCity())) {
            $venueParts[] = $this->getVenueCity();
        }

        if (!empty($this->getVenueRegion())) {
            $venueParts[] = $this->getVenueRegion();
        }

        if (!empty($this->getVenueCountry())) {
            $venueParts[] = $this->getVenueCountry();
        }

        return implode(', ', $venueParts);
    }

    public function getVenueName(): string
    {
        return $this->venueName;
    }

    public function getVenueCity(): string
    {
        return $this->venueCity;
    }

    public function getVenueRegion(): string
    {
        return $this->venueRegion;
    }

    public function getVenueCountry(): string
    {
        return $this->venueCountry;
    }

    public function getVenueLatitude(): string
    {
        return $this->venueLatitude;
    }

    public function getVenueLongitude(): string
    {
        return $this->venueLongitude;
    }

    public function getOfferType(): string
    {
        return $this->offerType;
    }

    public function getOfferUrl(): string
    {
        return $this->offerUrl;
    }

    public function getOfferStatus(): string
    {
        return $this->offerStatus;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }
}
