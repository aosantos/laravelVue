<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->segment(3);
        return [
            'category_id' => 'required|exists:categories,id',
            'name'        => "required|min:3|max:10|unique:products,name,{$id},id",
            'description' => 'max:1000',
            'image'       => 'image'
        ];
    }
}
