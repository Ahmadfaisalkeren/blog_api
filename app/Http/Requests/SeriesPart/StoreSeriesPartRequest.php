<?php

namespace App\Http\Requests\SeriesPart;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesPartRequest extends FormRequest
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
        return [
            'series_id' => 'required',
            'part_number' => 'required|numeric',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
}
