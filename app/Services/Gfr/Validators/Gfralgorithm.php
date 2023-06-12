<?php

namespace App\Services\Gfr\Validators;

use App\Models\Enums\Gfralgorithm as GfralgorithmEnum;
use App\Models\Patient;
use App\Services\Chain;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Event\InvalidArgumentException;

class Gfralgorithm extends Chain
{
    public function process(Model|Patient $model): void
    {
        if (!$model->gfralgorithm instanceof GfralgorithmEnum) {
            throw new InvalidArgumentException('Unsupported value for "gfralgorithm"!');
        }

        parent::process($model);
    }
}
