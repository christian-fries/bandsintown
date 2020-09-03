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

class Artist extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $thumbUrl;

    /**
     * @var string
     */
    protected $facebookPageUrl;

    /**
     * @var string
     */
    protected $mbid;

    /**
     * @var int
     */
    protected $trackerCount;

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    public function getFacebookPageUrl(): string
    {
        return $this->facebookPageUrl;
    }

    public function getMbid(): string
    {
        return $this->mbid;
    }

    public function getTrackerCount(): int
    {
        return $this->trackerCount;
    }
}
