<?php

declare(strict_types=1);

namespace App\Modules\Sanctum;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SanctumValidator
{
    public function validateIssueToken(array $rawData)
    {
        $validator = Validator::make($rawData, [
            "email" => "required|email",
            "password" => "required|string",
            "device" => "required|string",
        ]);

        if ($validator->fails())
            throw new InvalidArgumentException(json_encode($validator->errors()->all()));
    }
}
