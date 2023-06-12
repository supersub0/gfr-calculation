<?php

namespace App\Services\Gfr;

use App\Models\Enums\Gender;
use App\Models\Enums\Gfralgorithm;
use App\Models\Patient;

class Calculation
{
    public const DEFAULT_MULTIPLIER = 1;
    public const FEMALE_MDRD_MULTIPLIER = 0.742;
    public const FEMALE_COCKROFT_GAULT_MULTIPLIER = 0.742;

    public function calcByPatient(Patient $patient): void
    {
        $patient->gfr = (int) match ($patient->gfralgorithm) {
            Gfralgorithm::useCockcroftGault => $this->calcCockroftGault($patient),
            default => $this->calcMdrd($patient)
        };
    }

    private function calcMdrd(Patient $patient): float
    {
        $multiplier = match ($patient->gender) {
            Gender::female => Calculation::FEMALE_MDRD_MULTIPLIER,
            default => Calculation::DEFAULT_MULTIPLIER
        };

        return 186 * pow($patient->creatinine, -1.154) * pow($patient->age, -0.203) * $multiplier;
    }

    private function calcCockroftGault(Patient $patient): float
    {
        $multiplier = match ($patient->gender) {
            Gender::female => Calculation::FEMALE_COCKROFT_GAULT_MULTIPLIER,
            default => Calculation::DEFAULT_MULTIPLIER
        };

        return ((140 - $patient->age) / $patient->creatinine) * ($patient->weight / 72) * $multiplier;
    }
}
