<?php
defined('TYPO3_MODE') || die('Access denied.');

(function () {
    /**
     * Register frontend plugins
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'CHF.Bandsintown',
        'Artists',
        'Artists'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'CHF.Bandsintown',
        'Events',
        'Events'
    );

    /**
     * Register flexforms
     */
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bandsintown_artists'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'bandsintown_artists',
        'FILE:EXT:bandsintown/Configuration/FlexForms/Artists.xml'
    );

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['bandsintown_events'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'bandsintown_events',
        'FILE:EXT:bandsintown/Configuration/FlexForms/Events.xml'
    );

    // Exclude unused fields
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bandsintown_artists'] = 'pages,recursive';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['bandsintown_events'] = 'pages,recursive';
})();
