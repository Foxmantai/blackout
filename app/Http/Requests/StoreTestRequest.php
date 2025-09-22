<?php

namespace App\Http\Requests;

use App\Models\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('test_create');
    }

    public function rules()
    {
        return [
            'test' => [
                'string',
                'nullable',
            ],
            'integer' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'float' => [
                'numeric',
            ],
            'data_picker' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_time_picker' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'time_picker' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'file' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
