<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            
            'name'          => "required|unique:roles,name,$this->role_id|min:3",
            'user_id'       => 'required|exists:users,id',
            'role_id'       => 'required|exists:roles,id',
            'permissions'   => 'required|array|min:1',
            'description'   => 'nullable',
        ];
    }
}
