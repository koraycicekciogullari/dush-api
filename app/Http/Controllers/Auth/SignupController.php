<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\Auth\SignupResource;
use App\Models\User;

class SignupController extends Controller
{

    /**
     * @param SignupRequest $request
     * @return SignupResource
     */
    public function store(SignupRequest $request): SignupResource
    {
        return new SignupResource(User::create($request->validated()));
    }
}
