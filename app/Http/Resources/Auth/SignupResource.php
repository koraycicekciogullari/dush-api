<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SignupResource
 */
class SignupResource extends JsonResource
{

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
