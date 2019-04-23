<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [
                        'validation' => [
                            'accepted'
                        ]
                    ];
                }
            case 'POST':
                {
                    return [
                        'last_name' => 'required|regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,()]+$^|string|min:2|max:50',
                        'first_name' => 'required|regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,()]+$^|string|min:2|max:50',
                        'email' => 'required|email|min:3|max:250',
                        'password' => 'required|string|min:6|max:250|confirmed'
                    ];
                }
            case 'PUT':
                {
                    $id = $this->route()->parameter('id');
                    return [
                        'last_name' => 'required|regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,()]+$^|string|min:2|max:50',
                        'first_name' => 'required|regex:^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ_.,()]+$^|string|min:2|max:50',
                        'email' => 'required|email|min:3|max:250|unique:tenant.users,email,' . $id,
                    ];
                }
            case 'PATCH':
                {
                    return [];
                }
            default:
                break;
        }
    }
}
