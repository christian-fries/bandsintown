<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Controller;

use CHF\Bandsintown\Domain\Model\Artist;
use CHF\Bandsintown\Domain\Repository\ArtistRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ArtistController extends ActionController
{
    /**
     * @var ArtistRepository
     */
    protected $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function listAction()
    {
        $artists = $this->artistRepository->findAll();
        $this->view->assign('artists', $artists);
    }

    public function showAction(Artist $artist)
    {
        $this->view->assign('artist', $artist);
    }
}
