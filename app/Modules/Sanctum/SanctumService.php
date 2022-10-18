<?php

declare(strict_types=1);

namespace App\Modules\Sanctum;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SanctumService
{
    private SanctumValidator $validator;

    public function __construct(SanctumValidator $validator)
    {
        $this->validator = $validator;
    }

    public function issueToken(array $rawData): string
    {
        $this->validator->validateIssueToken($rawData);

        $data = SanctumAuthorizeRequestMapper::mapFrom($rawData);

        if (!Auth::attempt([
            "email" => $data->getEmail(),
            "password" => $data->getPassword()
        ])) {
            throw new BadRequestException("The provided credentials doesnt match our records");
        }

        return Auth::user()->createToken($data->getDevice())->plainTextToken;
    }
}
