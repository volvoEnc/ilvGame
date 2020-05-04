<?php

namespace App\Http\Resources;

use App\Http\Resources\Privileges\ShortPrivilegeResource;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Collection;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
            'email' => $this->email,
            'invite_user' => $this->invite_user($this->invite_user_id),
            'money' => $this->money,
            'status' => $this->status,
            'privileges' => ShortPrivilegeResource::collection($this->privileges),
            'theme' => $this->theme
        ];
    }
}
