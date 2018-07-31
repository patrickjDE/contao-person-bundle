<?php

$GLOBALS['BE_MOD']['content']['person'] = [
    'tables' => ['tl_person_group', 'tl_person'],
];

$GLOBALS['FE_MOD']['person'] = [
    'personList' => 'Patrickjde\Contao\PersonBundle\FrontendModule\PersonList',
    'pagePersonList' => 'Patrickjde\Contao\PersonBundle\FrontendModule\PagePersonList',
];

$GLOBALS['TL_CTE']['includes']['person'] = 'Patrickjde\Contao\PersonBundle\ContentElement\Person';

$GLOBALS['TL_MODELS']['tl_person'] = 'Patrickjde\Contao\PersonBundle\Model\PersonModel';
$GLOBALS['TL_MODELS']['tl_person_group'] = 'Patrickjde\Contao\PersonBundle\Model\PersonGroup';
