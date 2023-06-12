<?php

namespace App\Services\Gfr\Validators;

use App\Models\Enums\Gender as GenderEnum;
use App\Models\Patient;
use App\Services\Chain;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Event\InvalidArgumentException;

class Gender extends Chain
{
    public function process(Model|Patient $model): void
    {
        if (!$model->gender instanceof GenderEnum) {
            throw new InvalidArgumentException('Unsupported value for "gender"!');
        }

        parent::process($model);
    }
}
