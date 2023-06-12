<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Chain
{
    private ?Chain $next = null;

    public function setNext(Chain $chain): Chain
    {
        $this->next = $chain;

        return $chain;
    }

    public function process(Model $model): void
    {
        $this->next?->process($model);
    }
}
