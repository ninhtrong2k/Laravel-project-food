<?php

namespace Modules\Product\Src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name'=> 'required|max:255',
            'slug'=> 'required|max:255',
            'category_id'=> 'required|integer',
            'status'=> ['required','integer',function($attribute, $value,$fail){
                if($value != 0 && $value != 1){
                    $fail(__('product::validation.select'));
                }
            }],  
            'quantity'=> 'required|integer',
            'image'=> 'required|max:255',
            'description'=> 'required',
        ];
        return $rules;
    }
    public function messages(){
        return [
            'required'=> __('product::validation.required'),
            'min'=> __('product::validation.min'),
            'max'=> __('product::validation.max'),
            'integer'=> __('product::validation.integer'),
        ];
    }
    public function attributes(){
        return __('product::validation.attributes');
    }

}
