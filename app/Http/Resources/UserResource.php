<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return  [
            'avatar' => $this->avatar ?: url('static/avatar.jpeg'),
            // 'permissions' => $this->getAllPermissions()->pluck('name'),
            // 'roles' => $this->roles
        ] + parent::toArray($request);
    }
}
