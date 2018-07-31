<?php

namespace Patrickjde\Contao\PersonBundle\FrontendModule;

use Contao\BackendTemplate;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Module;
use Patchwork\Utf8;
use Patrickjde\Contao\PersonBundle\Model\PersonModel;

class PersonList extends Module
{
    protected $strTemplate = 'mod_personlist';

    protected $strPersonTemplate = 'person_default';

    public function generate()
    {
        if (TL_MODE === 'BE') {
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['personList'][0]) . ' ###';
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->title;
            $objTemplate->href = 'contao/main.php?do=form&amp;table=tl_form_field&amp;id=' . $this->id;

            return $objTemplate->parse();
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
        $collPerson = PersonModel::findBy('pid', $this->personGroup, ['order' => 'sorting ASC', 'return' => 'Collection']);
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
