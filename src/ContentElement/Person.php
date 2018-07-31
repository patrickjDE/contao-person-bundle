<?php

namespace Patrickjde\Contao\PersonBundle\ContentElement;

use Contao\ContentElement;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Patrickjde\Contao\PersonBundle\Model\PersonModel;

class Person extends ContentElement
{
    protected $strTemplate = 'ce_person';

    protected $strPersonTemplate = 'person_default';

    public function generate()
    {
        if ($this->personTemplate) {
            $this->strPersonTemplate = $this->personTemplate;
        }

        return parent::generate();
    }

    public function compile()
    {
        if ($this->person) {
            /** @var PersonModel $objPerson */
            $objPerson = PersonModel::findByPk($this->person);

            if ($objPerson) {
                $personTemplate = new FrontendTemplate($this->strPersonTemplate);
                $personTemplate->setData($objPerson->row());

                if ($objPerson->image) {
                    $arrImageData['size'] = deserialize($this->size);
                    $objFile = FilesModel::findByPk($objPerson->image);
                    $arrImageData['singleSRC'] = $objFile->path;
                    $arrImageData['alt'] = $objPerson->getFullName();

                    Controller::addImageToTemplate($personTemplate, $arrImageData);
                }

                $this->Template->person = $personTemplate->parse();
            }
        }
    }
}
