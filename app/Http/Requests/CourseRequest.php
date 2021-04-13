<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
           'title'=>'required|string|max:300',
           'title_en'=>'required|string|max:300',
           'description'=>'required|string|min:100',
           'description_en'=>'required|string|min:100',
           'thumbnail'=>'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
           'price'=>'present',
           'instructor_id'=>'required'
        ];
    }
}
