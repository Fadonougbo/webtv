<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('show_admin_interface');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['string','required','min:2','max:165','unique:posts,title'],
            'url'=>['string','required','url','max:250'],
            'categories'=>['array','required'],
            'categories.*'=>['exists:categories,id','integer'],
            'image'=>['nullable','file','image'],
            'description'=>['nullable','string'],
            'isOnline'=>['boolean','nullable']
        ];
    }
}
