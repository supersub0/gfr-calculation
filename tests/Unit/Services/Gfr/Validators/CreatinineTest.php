<?php

namespace Unit\Services\Gfr\Validators;

use App\Models\Patient;
use App\Services\Gfr\Validators\Creatinine;
use InvalidArgumentException;
use Tests\TestCase;

class CreatinineTest extends TestCase
{
    public function test_processEmptyCreatinine(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new Creatinine())->process(new Patient());
    }
}
