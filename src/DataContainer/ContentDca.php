<?php

namespace Patrickjde\Contao\PersonBundle\DataContainer;

use Contao\Backend;
use Patrickjde\Contao\PersonBundle\Model\PersonModel;
use Patrickjde\Contao\PersonBundle\Model\PersonGroup;

class ContentDca extends Backend
{
    public function getPersonSelectOptions()
    {
        $arrPersons = [];
        $collPersonGroups = PersonGroup::findAll(['return' => 'Collection', 'orderBy' => 'title ASC']);

        foreach($collPersonGroups as $personGroup) {
            $arrGroupPersons = [];
            $collGroupPersons = PersonModel::findBy('pid', $personGroup->id, ['return' => 'Collection', 'orderBy' =>
                'lastname ASC']);
            foreach($collGroupPersons as $groupPerson) {
                $arrGroupPersons[$groupPerson->id] = $groupPerson->getFullName(true);
            }
            $arrPersons[$personGroup->title] = $arrGroupPersons;
        }

        return $arrPersons;
    }
}
