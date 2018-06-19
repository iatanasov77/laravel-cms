<?php

namespace IA\Laravel\Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortletsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item.title:*'    => 'required|string',
            'item.description:*' => 'required|string',
            //'item.image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
