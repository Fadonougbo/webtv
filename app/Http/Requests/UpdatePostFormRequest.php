<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostFormRequest extends FormRequest
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
        $post=$this->route()->parameter('post')->id;

        return [
            'title'=>['string','required','min:2','max:165',Rule::unique('posts','title')->ignore($post)],
            'url'=>['string','required','url','max:250'],
            'categories'=>['array','required'],
            'categories.*'=>['exists:categories,id','integer'],
            'image'=>['nullable','file','image'],
            'description'=>['nullable','string'],
            'isOnline'=>['boolean','nullable']
        ];
    }
}
