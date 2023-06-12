<?php

namespace Unit\Services\Gfr\Validators;

use App\Models\Patient;
use App\Services\Gfr\Validators\Gfralgorithm;
use InvalidArgumentException;
use Tests\TestCase;

class GfralgorithmTest extends TestCase
{
    public function test_processEmptyGfralgorithm(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new Gfralgorithm())->process(new Patient());
    }
}
