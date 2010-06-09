<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Project' => 'index, show, new, create, edit, update, delete','Tag' => 'index, show, new, create, edit, update, delete',
	),
	array(
		'Project' => 'create, update, delete','Tag' => 'create, update, delete',
	)
);

?>