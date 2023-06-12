<?php

namespace App\Services\Gfr;

use App\Services\Chain;
use App\Services\Gfr\Validators\Creatinine;
use App\Services\Gfr\Validators\Gender;
use App\Services\Gfr\Validators\Gfralgorithm;

class Factory
{
    public static function getPatiantValidators(): Chain
    {
        $validators = new Gender();
        $validators->setNext(new Creatinine())
            ->setNext(new Gfralgorithm());

        return $validators;
    }
}
