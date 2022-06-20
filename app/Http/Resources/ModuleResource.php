<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    public function toArray($request)
    {
        $permissionFile = base_path("addons/{$this->name}/Config/permissions.php");

        return parent::toArray($request) + [
            'permissions' => $this->getPermissions($permissionFile)
        ];
    }
}
