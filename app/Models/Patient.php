<?php

namespace App\Models;
use App\Models\Enums\Gender;
use App\Models\Enums\Gfralgorithm;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $casts = [
        'gender' => Gender::class,
        'gfralgorithm' => Gfralgorithm::class,
    ];
}
