<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $data['logo'] = $data['logo'] ?: url('static/logo.png');

        if (!is_super_admin()) {
            unset($data['config']);
        }

        return $data;
    }
}
