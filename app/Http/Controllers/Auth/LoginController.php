<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

/**
 * Class LoginController
 */
class LoginController extends Controller
{

    /**
     * @throws AuthenticationException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        if(!Auth::attempt($request->validated()))
        {
            throw new AuthenticationException();
        }
        return response()->json(User::find($request->user()->id));
    }
}
