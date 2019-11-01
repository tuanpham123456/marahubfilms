<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required|unique:products,pro_name,' .$this->id,
            'pro_category_id' => 'required',
            'pro_description_seo' => 'required',
            'pro_description' => 'required',
            'pro_content' => 'required',
            'pro_avatar' => 'required'


        ];
    }
    public function messages()
    {
        return[
            'pro_name.required' => 'Trường này không được để trống',
            'pro_name.unique' => 'Tên này đã tồn tại',
            'pro_category_id.required' => 'Trường này không được để trống',
            'pro_description.required' => 'Trường này không được để trống',
            'pro_description_seo.required' => 'Trường này không được để trống',
            'pro_content.required' => 'Trường này không được để trống',
            'pro_avatar.required' => 'Trường này không được để trống',





        ];
    }
}
