<?php

namespace Patrickjde\Contao\PersonBundle\Model;

use Contao\Model;

class PersonModel extends Model
{
    protected static $strTable = 'tl_person';

    public function getFullName($inverted = false)
    {
        if ($inverted) {
            return $this->lastname . ', ' . $this->firstname;
        }

        return $this->firstname . ' ' . $this->lastname;
    }
}
