<?php

namespace Modules\Category\Src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the teacher is authorized to make this request.
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
        $rules = [
            'name'=> 'required|max:255',
        ];
        return $rules;
    }
    public function messages(){
        return [
            'required'=> __('user::validation.required'),
        ];
    }
    public function attributes(){
        return __('product::validation.attributes');
    }
}
