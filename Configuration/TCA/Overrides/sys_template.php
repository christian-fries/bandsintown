<?php
defined('TYPO3_MODE') || die('Access denied.');

(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'bandsintown',
        'Configuration/TypoScript',
        'Bandsintown'
    );
})();
