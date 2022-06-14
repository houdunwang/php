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

    protected function getPermissions($file)
    {
        if (!is_file($file)) return [];

        return collect(require $file)->map(function ($permission) {
            return [
                "title" => $permission['title'],
                "items" => collect($permission['items'])->map(function ($item) {
                    return ['name' => $this->name . "_" . $item['name'], 'title' => $item['title']];
                })
            ];
        });
    }
}
