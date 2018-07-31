<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['person'] = '{type_legend},type,headline;{person_legend},person,size;{template_legend},personTemplate,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['person'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['person'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['Patrickjde\Contao\PersonBundle\DataContainer\ContentDca', 'getPersonSelectOptions'],
    'eval'             => ['mandatory' => true, 'chosen' => true],
    'sql'              => "int(10) NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['personTemplate'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['personTemplate'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => ['Patrickjde\Contao\PersonBundle\DataContainer\PersonDca', 'getPersonTemplates'],
    'eval'             => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql'              => "varchar(64) NOT NULL default ''",
];
