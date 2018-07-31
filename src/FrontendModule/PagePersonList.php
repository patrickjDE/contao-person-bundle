<?php

namespace Patrickjde\Contao\PersonBundle\FrontendModule;

use Contao\BackendTemplate;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Module;
use Patchwork\Utf8;
use Patrickjde\Contao\PersonBundle\Model\PersonModel;

class PagePersonList extends Module
{
    protected $strTemplate = 'mod_pagepersonlist';

    protected $strPersonTemplate = 'person_default';

    public function generate()
    {
        if (TL_MODE === 'BE') {
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['pagePersonList'][0]) . ' ###';
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->title;
            $objTemplate->href = 'contao/main.php?do=form&amp;table=tl_form_field&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        // don't output anything if there are no persons selected
        // this way the whole section will be hidden
        // if the module is put into a custom layout section
        global $objPage;
        if (!$objPage->person) {
            return '';
        }

        if ($this->personTemplate) {
            $this->strPersonTemplate = $this->personTemplate;
        }

        return parent::generate();
    }

    /**
     * Generate the module
     */
    protected function compile()
    {
        global $objPage;

        $collPerson = PersonModel::findMultipleByIds(deserialize($objPage->person));
        $strPersons = '';

        if ($collPerson) {
            foreach ($collPerson as $person) {
                $personTemplate = new FrontendTemplate($this->strPersonTemplate);
                $personTemplate->setData($person->row());

                if ($person->image) {
                    $arrImageData['size'] = deserialize($this->imgSize);
                    $objFile = FilesModel::findByPk($person->image);
                    $arrImageData['singleSRC'] = $objFile->path;
                    $arrImageData['alt'] = $person->getFullName();

                    Controller::addImageToTemplate($personTemplate, $arrImageData);
                }

                $strPersons .= $personTemplate->parse();
            }
        }

        $this->Template->persons = $strPersons;
    }
}
