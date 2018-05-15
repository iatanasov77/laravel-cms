<?php

namespace Modules\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticPagesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $actionMethod   = $this->route()->getActionMethod();

        if ( $actionMethod == 'store' ) return [
            'item.title:*'    => 'required|string',
            'item.body:*'     => 'required',
            'item.image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        if ( $actionMethod == 'update' ) return [
            'item.title:*'    => 'required|string',
            'item.body:*'     => 'required',
            'item.image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        return [];
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
