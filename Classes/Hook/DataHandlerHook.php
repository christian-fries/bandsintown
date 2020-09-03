<?php
declare(strict_types=1);

/***
 * This file is part of the "Bandsintown" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 ***/

namespace CHF\Bandsintown\Hook;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DataHandlerHook
{
    /**
     * @param string $status
     * @param string $table
     * @param string $id
     * @param array $fieldArray
     * @param \TYPO3\CMS\Core\DataHandling\DataHandler $reference
     */
    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$reference)
    {
        if ($table === 'tx_bandsintown_domain_model_artist' && $status === 'new') {
            /** @var RequestFactory $requestFactory */
            $requestFactory = GeneralUtility::makeInstance(RequestFactory::class);
            $applicationId = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('bandsintown', 'applicationId');

            $url = 'https://rest.bandsintown.com/artists/' . urlencode($fieldArray['name']) . '/?app_id=' . urlencode($applicationId);
            $additionalOptions = [
                'headers' => ['Cache-Control' => 'no-cache'],
                'allow_redirects' => false
            ];

            $response = $requestFactory->request($url, 'GET', $additionalOptions);

            if ($response->getStatusCode() === 200) {
                $content = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $fieldArray['id'] = $content->id;
                $fieldArray['url'] = $content->url;
                $fieldArray['image_url'] = $content->image_url;
                $fieldArray['thumb_url'] = $content->thumb_url;
                $fieldArray['facebook_page_url'] = $content->facebook_page_url;
                $fieldArray['mbid'] = $content->mbid;
                $fieldArray['tracker_count'] = $content->tracker_count;
            }
        }
    }
}
