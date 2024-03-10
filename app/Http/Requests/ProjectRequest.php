<?php

namespace App\Http\Requests;

use App\Models\Lang;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        if ($this->_method == 'PUT') {
            $image = 'nullable|image|mimes:jpeg,png,jpg';
        } else {
            $image = 'required|image|mimes:jpeg,png,jpg';
        }

        $rules = [
            'image' => $image,
            'date' => 'required|string',
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'is_finished' => 'nullable|in:on',
            'facilities' => 'nullable|array',
            "facilities" => "nullable|array",
            "facilities.*.facility" => "nullable|int",
            "facilities.*.value" => "nullable|string",
        ];

        $langs = Lang::where('is_published', true)->get();
        foreach ($langs as $lang) {
            $rules['address_' . $lang->code] = 'required|string';
        }

        return $rules;
    }
}
