<?php

namespace App\Services\Gfr;

use App\Models\Patient;

class Validation
{
    public function validatePatient(Patient $patient): void
    {
        Factory::getPatiantValidators()->process($patient);
    }
}
