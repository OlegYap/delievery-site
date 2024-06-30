<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'surname.required' => 'Поле "Фамилия" обязательно для заполнения',
            'phone.required' => 'Поле "Телефон" обязательно для заполнения',
            'address.required' => 'Поле "Адрес" обязательно для заполнения'
        ];
    }
}
