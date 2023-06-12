<?php

namespace Unit\Services\Gfr\Validators;

use App\Models\Patient;
use App\Services\Gfr\Validators\Gender;
use InvalidArgumentException;
use Tests\TestCase;

class GenderTest extends TestCase
{
    public function test_processEmptyGender(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new Gender())->process(new Patient());
    }
}
