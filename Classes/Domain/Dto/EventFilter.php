<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Domain\Dto;

class EventFilter
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $orderBy;

    /**
     * @var string
     */
    protected $orderDirection;

    /**
     * @var array<int>
     */
    protected $artists;

    /**
     * @var string
     */
    protected $searchString = '';

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    public function setOrderBy(string $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    public function getOrderDirection(): string
    {
        return $this->orderDirection;
    }

    public function setOrderDirection(string $orderDirection): void
    {
        $this->orderDirection = $orderDirection;
    }

    public function getArtists(): array
    {
        return $this->artists;
    }

    public function setArtists(array $artists): void
    {
        $this->artists = $artists;
    }

    public function getSearchString(): string
    {
        return $this->searchString;
    }

    public function setSearchString(string $searchString): void
    {
        $this->searchString = $searchString;
    }
}
