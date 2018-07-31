<?php

$personPalette = ';{person_legend:hide},person';
if (strpos($GLOBALS['TL_DCA']['tl_page']['palettes']['regular'], '{meta_legend')) {
    $GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = preg_replace('#({meta_legend[^;\r\n]+)#', '$1' . $personPalette, $GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);
} else {
    $GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] .= $personPalette;
}

$GLOBALS['TL_DCA']['tl_page']['fields']['person'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_page']['person'],
    'exclude'          => true,
    'filter'           => true,
    'inputType'        => 'checkboxWizard',
    'options_callback' => [Patrickjde\Contao\PersonBundle\DataContainer\ModuleDca::class, 'getPersonCheckboxOptions'],
    'eval'             => ['multiple' => true, 'tl_class' => 'clr'],
    'sql'              => "blob NULL",
];
