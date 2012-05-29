<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Simple image teaser'
);



t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Simple image teaser');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1','FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');




			t3lib_extMgm::addLLrefForTCAdescr('tx_simteaser_domain_model_widget', 'EXT:simteaser/Resources/Private/Language/locallang_csh_tx_simteaser_domain_model_widget.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_simteaser_domain_model_widget');
			$TCA['tx_simteaser_domain_model_widget'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:simteaser/Resources/Private/Language/locallang_db.xml:tx_simteaser_domain_model_widget',
					'label' => 'items',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Widget.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_simteaser_domain_model_widget.gif'
				),
			);


?>