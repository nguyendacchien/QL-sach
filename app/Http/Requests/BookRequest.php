<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        return [
            'name'=>'required | unique:books,name',
            'price'=>'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'không được để trống',
            'name.unique'=> 'tên đã đã tồn tại',
          'price.required'=>'không được để trống',
          'description.required'=>'không được để trống',
        ];

    }
}
