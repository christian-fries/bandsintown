<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class ArtistRepository extends Repository
{
    public function findByPid(int $storagePid)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setStoragePageIds([$storagePid]);

        return $query->execute();
    }
}
