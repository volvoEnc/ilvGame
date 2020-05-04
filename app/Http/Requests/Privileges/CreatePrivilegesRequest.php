<?php

namespace App\Http\Requests\Privileges;

use App\Http\Requests\ApiRequest;
use App\Privilege;
use Illuminate\Validation\Rule;

class CreatePrivilegesRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
        ];
        if ($this->has('user_id') && $this->has('action')) {
            $p = Privilege::query()->where('user_id', $this->user_id)->where('action', $this->action)->first();
            if ($p == null) {
                $rules['user_id'] = ['exists:users,id'];
                $rules['action'] = ['required', 'string', 'max:255'];
            }
            else
                $rules['action'] = ['required', 'string', 'max:255', 'unique:privileges'];
        }
        else
            $rules['action'] = ['required', 'string', 'max:255', 'unique:privileges'];

        return $rules;
    }
}
