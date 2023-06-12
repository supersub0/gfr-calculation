<?php

namespace Unit\Services\Gfr;

use App\Models\Enums\Gender;
use App\Models\Enums\Gfralgorithm;
use App\Models\Patient;
use App\Services\Gfr\Calculation;
use Tests\TestCase;

class CalculationTest extends TestCase
{
    /**
     * @dataProvider dataProviderCalcByClient
     */
    public function test_calcByPatient(float $expected, float $creatinine, int $age, Gender $gender, Gfralgorithm $gfralgorithm): void
    {
        $patient = new Patient();
        $patient->creatinine = $creatinine;
        $patient->age = $age;
        $patient->weight = 42;
        $patient->gender = $gender;
        $patient->gfralgorithm = $gfralgorithm;

        (new Calculation())->calcByPatient($patient);

        $this->assertEquals($expected, $patient->gfr);
    }

    public static function dataProviderCalcByClient(): array
    {
        return [
            [
                37801,
                .01,
                1,
                Gender::male,
                Gfralgorithm::useMdrd,
            ],
            [
                2651,
                .1,
                1,
                Gender::male,
                Gfralgorithm::useMdrd,
            ],
            [
                1063,
                .1,
                90,
                Gender::male,
                Gfralgorithm::useMdrd,
            ],
            [
                37801,
                .01,
                1,
                Gender::diverse,
                Gfralgorithm::useMdrd,
            ],
            [
                2651,
                .1,
                1,
                Gender::diverse,
                Gfralgorithm::useMdrd,
            ],
            [
                1063,
                .1,
                90,
                Gender::diverse,
                Gfralgorithm::useMdrd,
            ],
            [
                28048,
                .01,
                1,
                Gender::female,
                Gfralgorithm::useMdrd,
            ],
            [
                1967,
                .1,
                1,
                Gender::female,
                Gfralgorithm::useMdrd,
            ],
            [
                789,
                .1,
                90,
                Gender::female,
                Gfralgorithm::useMdrd,
            ],
            [
                8108,
                .01,
                1,
                Gender::male,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                810,
                .1,
                1,
                Gender::male,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                291,
                .1,
                90,
                Gender::male,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                8108,
                .01,
                1,
                Gender::diverse,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                810,
                .1,
                1,
                Gender::diverse,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                291,
                .1,
                90,
                Gender::diverse,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                6016,
                .01,
                1,
                Gender::female,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                601,
                .1,
                1,
                Gender::female,
                Gfralgorithm::useCockcroftGault,
            ],
            [
                216,
                .1,
                90,
                Gender::female,
                Gfralgorithm::useCockcroftGault,
            ],
        ];
    }
}
