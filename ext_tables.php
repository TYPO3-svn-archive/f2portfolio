<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'f2portfolio'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'f2portfolio');

//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_f2portfolio_domain_model_project','EXT:f2portfolio/Resources/Private/Language/locallang_csh_tx_f2portfolio_domain_model_project.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_f2portfolio_domain_model_project');
$TCA['tx_f2portfolio_domain_model_project'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_project',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_f2portfolio_domain_model_project.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_f2portfolio_domain_model_tag','EXT:f2portfolio/Resources/Private/Language/locallang_csh_tx_f2portfolio_domain_model_tag.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_f2portfolio_domain_model_tag');
$TCA['tx_f2portfolio_domain_model_tag'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_tag',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_f2portfolio_domain_model_tag.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_f2portfolio_domain_model_images','EXT:f2portfolio/Resources/Private/Language/locallang_csh_tx_f2portfolio_domain_model_images.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_f2portfolio_domain_model_images');

$TCA['tx_f2portfolio_domain_model_images'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
                'hideTable'                     => true,
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_f2portfolio_domain_model_images.gif'
	)
);

?>