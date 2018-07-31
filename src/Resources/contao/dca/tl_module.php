<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['personList'] = '{title_legend},name,headline,type;{person_legend},personGroup,imgSize;{template_legend},personTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['pagePersonList'] = '{title_legend},name,headline,type;{person_legend},imgSize;{template_legend},personTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['personGroup'] = [
    'label'      => &$GLOBALS['TL_LANG']['tl_module']['personGroup'],
    'exclude'    => true,
    'inputType'  => 'select',
    'foreignKey' => 'tl_person_group.title',
    'eval'       => ['mandatory' => true, 'tl_class' => 'w50'],
    'sql'        => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['personTemplate'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_module']['personTemplate'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['Patrickjde\Contao\PersonBundle\DataContainer\PersonDca', 'getPersonTemplates'],
    'eval'             => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql'              => "varchar(64) NOT NULL default ''",
];
