<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Project' => 'main, show, list',
	),
	array(
		'Project' => 'main, show, list',
	)
);

?>