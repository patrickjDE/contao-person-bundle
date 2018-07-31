<?php

namespace Patrickjde\Contao\PersonBundle\DataContainer;

use Contao\Backend;
use Patrickjde\Contao\PersonBundle\Model\PersonModel;

class ModuleDca extends Backend
{
    public function getPersonCheckboxOptions()
    {
        $arrPersons = [];
        $collPersons = PersonModel::findAll(['return' => 'Collection', 'orderBy' => 'lastname ASC']);
        foreach($collPersons as $person) {
            $arrPersons[$person->id] = $person->getFullName(true);
        }

        return $arrPersons;
    }
}
