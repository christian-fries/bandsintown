<?php
defined('TYPO3_MODE') || die('Access denied.');

(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CHF.Bandsintown',
        'Artists',
        [
            'Artist' => 'list, show'
        ],
        []
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CHF.Bandsintown',
        'Events',
        [
            'Event' => 'list, filteredList, show'
        ],
        [
            'Event' => 'filteredList'
        ]
    );

    // Add plugins to new content element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                artists {
                    iconIdentifier = bandsintown-plugin-artists
                    title = LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:plugin.artists.name
                    description = LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:plugin.artists.description
                    tt_content_defValues {
                        CType = list
                        list_type = bandsintown_artists
                    }
                }
                events {
                    iconIdentifier = bandsintown-plugin-events
                    title = LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:plugin.events.name
                    description = LLL:EXT:bandsintown/Resources/Private/Language/locallang_db.xlf:plugin.events.description
                    tt_content_defValues {
                        CType = list
                        list_type = bandsintown_events
                    }
                }
            }
            show = *
        }
    }'
    );

    // Register icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

    $iconRegistry->registerIcon(
        'bandsintown-plugin-artists',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:bandsintown/Resources/Public/Icons/plugin-artists.svg']
    );

    $iconRegistry->registerIcon(
        'bandsintown-plugin-events',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:bandsintown/Resources/Public/Icons/plugin-events.svg']
    );

    // Register DataHandler hook
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['bandsintown'] = 'CHF\Bandsintown\Hook\DataHandlerHook';
})();
