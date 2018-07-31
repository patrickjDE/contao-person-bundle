<?php

$GLOBALS['TL_DCA']['tl_person'] = [

    // Config
    'config'   => [
        'dataContainer'    => 'Table',
        'ptable'           => 'tl_person_group',
        'switchToEdit'     => true,
        'enableVersioning' => true,
        'sql'              => [
            'keys' => [
                'id'  => 'primary',
                'pid' => 'index',
            ],
        ],
    ],
    // List
    'list'     => [
        'sorting'           => [
            'mode'         => 4,
            'fields'       => ['sorting'],
            'headerFields' => ['title'],
            'child_record_callback' => [
                'Patrickjde\Contao\PersonBundle\DataContainer\PersonDca',
                'listPerson',
            ],
        ],
        'label'             => [
            'fields' => ['lastname', 'firstname'],
            'format' => '%s, %s',
        ],
        'global_operations' => [
            'all' => [
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"',
            ],
        ],
        'operations'        => [
            'edit'   => [
                'label' => &$GLOBALS['TL_LANG']['tl_person']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.svg',
            ],
            'copy'   => [
                'label' => &$GLOBALS['TL_LANG']['tl_person']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.svg',
            ],
            'delete' => [
                'label'      => &$GLOBALS['TL_LANG']['tl_person']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show'   => [
                'label' => &$GLOBALS['TL_LANG']['tl_person']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.svg',
            ],
        ],
    ],
    // Palettes
    'palettes' => [
        'default' => '{name_legend},firstname,lastname,function;{address_legend},street,street_number,postal_code,city;{contact_legend},phone,fax,mobile,email;{image_legend},image',
    ],
    // Fields
    'fields'   => [
        'id'            => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'pid'           => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'tstamp'        => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'sorting'       => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'firstname'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['firstname'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'lastname'      => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['lastname'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'function'      => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['function'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'street'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['street'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'street_number' => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['street_number'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'postal_code'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['postal_code'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(5) NOT NULL default ''",
        ],
        'city'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['city'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'phone'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['phone'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
                'rgxp'      => 'phone',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'fax'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['fax'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
                'rgxp'      => 'phone',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'mobile'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['mobile'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
                'rgxp'      => 'phone',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'email'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['email'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => [
                'tl_class'  => 'w50',
                'maxlength' => 255,
                'rgxp'      => 'email',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'image'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_person']['image'],
            'exclude'   => true,
            'search'    => false,
            'inputType' => 'fileTree',
            'eval'      => [
                'filesOnly'  => true,
                'fieldType'  => 'radio',
                'tl_class'   => 'clr',
                'extensions' => \Contao\Config::get('validImageTypes'),
            ],
            'sql'       => "binary(16) NULL",
        ],
    ],
];


