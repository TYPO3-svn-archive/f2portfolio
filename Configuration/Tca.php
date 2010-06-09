<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_f2portfolio_domain_model_project'] = array(
	'ctrl' => $TCA['tx_f2portfolio_domain_model_project']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,description,outstanding,date,tags,images'
	),
	'types' => array(
		'1' => array('showitem' => 'name,description;;2;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,outstanding,date,tags,images')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_f2portfolio_domain_model_project',
				'foreign_table_where' => 'AND tx_f2portfolio_domain_model_project.uid=###REC_FIELD_l18n_parent### AND tx_f2portfolio_domain_model_project.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_project.name',
			'config'  => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim,required'
			)
		),
		'description' => Array (
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.text',
			'l10n_mode' => $l10n_mode,
			'config' => Array (
				'type' => 'text',
				'cols' => '50',
				'rows' => '5',
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				)
			)
		),
		'outstanding' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_project.outstanding',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'date' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_project.date',
			'config'  => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0'
			)
		),
		"tags" => Array (
                        "exclude" => 0,
                        "label" => "LLL:EXT:mportfolio/Resources/Private/Language/locallang_db.xml:tx_mportfolio_domain_model_project.tags",
                        "config" => Array (
                                "type" => "select",
                                "foreign_table" => "tx_f2portfolio_domain_model_tag",
                                "size" => 10,
                                "minitems" => 0,
                                "maxitems" => 9999,
                                "MM" => "tx_f2portfolio_project_tag_mm",
                                'MM_opposite_field' => 'projects',
                                )
                ),
		'images' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_project.images',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_f2portfolio_domain_model_images',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
				),
			)
		),
	),
);

$TCA['tx_f2portfolio_domain_model_tag'] = array(
	'ctrl' => $TCA['tx_f2portfolio_domain_model_tag']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,description,projects'
	),
	'types' => array(
		'1' => array('showitem' => 'name,description;;2;richtext:rte_transform[flag=rte_enabled|mode=ts];4-4-4,projects')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_f2portfolio_domain_model_tag',
				'foreign_table_where' => 'AND tx_f2portfolio_domain_model_tag.uid=###REC_FIELD_l18n_parent### AND tx_f2portfolio_domain_model_tag.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_tag.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => Array (
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.text',
			'l10n_mode' => $l10n_mode,
			'config' => Array (
				'type' => 'text',
				'cols' => '50',
				'rows' => '5',
				'softref' => 'typolink_tag,images,email[subst],url',
				'wizards' => Array(
					'_PADDING' => 4,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				)
			)
		),
                "projects" => Array (
                        "exclude" => 0,
                        "label" => "LLL:EXT:mportfolio/Resources/Private/Language/locallang_db.xml:tx_mportfolio_domain_model_project.tags",
                        "config" => Array (
                                "type" => "select",
                                "foreign_table" => "tx_f2portfolio_domain_model_project",
                                "size" => 10,
                                "minitems" => 0,
                                "maxitems" => 9999,
                                "MM" => "tx_f2portfolio_project_tag_mm",
                                )
                ),
	),
);

$TCA['tx_f2portfolio_domain_model_images'] = array(
	'ctrl' => $TCA['tx_f2portfolio_domain_model_images']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,file,alttext,longdesc,description'
	),
	'types' => array(
		'1' => array('showitem' => 'name,file,alttext,longdesc,description')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_f2portfolio_domain_model_images',
				'foreign_table_where' => 'AND tx_f2portfolio_domain_model_images.uid=###REC_FIELD_l18n_parent### AND tx_f2portfolio_domain_model_images.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'file' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images.file',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0',
			)
		),
		'alttext' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images.alttext',
			'config'  => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			)
		),
		'longdesc' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images.longdesc',
			'config'  => array(
				'type' => 'text',
                                'cols' => 50,
                                'rows' => 5,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:f2portfolio/Resources/Private/Language/locallang_db.xml:tx_f2portfolio_domain_model_images.description',
			'config'  => array(
				'type' => 'text',
                                'cols' => 50,
                                'rows' => 5,
				'eval' => 'trim'
			)
		),
	),
);

?>