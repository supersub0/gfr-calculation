<?php

namespace App\Services\Gfr\Validators;

use App\Models\Patient;
use App\Services\Chain;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Event\InvalidArgumentException;

class Creatinine extends Chain
{
    public function process(Model|Patient $model): void
    {
        if ($model->creatinine < 0.01) {
            throw new InvalidArgumentException('Unsupported value for "creatinine"!');
        }

        parent::process($model);
    }
}
