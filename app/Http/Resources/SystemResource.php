<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $data['config']['site']['logo'] = $data['config']['site']['logo'] ?: url('static/logo.png');

        if (!is_super_admin()) {
            $system['config'] = ['site' => $data['site']];
        }

        return $data;
    }
}
