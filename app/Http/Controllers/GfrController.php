<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Services\Gfr\Calculation;
use App\Services\Gfr\Validation;
use Illuminate\Http\Response;
use InvalidArgumentException;
use Throwable;

class GfrController extends Controller
{
    public function show(Patient $patient): Patient|Response
    {
        try {
            (new Validation())->validatePatient($patient);
            (new Calculation())->calcByPatient($patient);

            $content = $patient;
            $status = Response::HTTP_OK;
        } catch (InvalidArgumentException $e) {
            $content = $e->getMessage();
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
        } catch (Throwable) {
            $content = null;
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response($content, $status);
    }
}
