<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class OfferCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string|max:128',
            'code'=>'required|max:32',
            'url'=>'required|url',
            'image'=>'required|url',
            'total_price'=>'required|numeric',
            'plots'=>'required|numeric|between:1,36',
            'plots_price'=>'required|numeric',
            'available_to'=>'required',
            'days'=>'between:1,365'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Informe o nome do Produto',
            'title.max'=>'Nome longo',
            'title.string'=>'Título Inválido',
            'code.required'=>'Informe o código',
            'code.max'=>'Código Inválido',
            'url.required'=>'Informe o Link',
            'url.url'=>'Link Inválido',
            'image.required'=>'Informe o Link',
            'image.url'=>'Link Inválido',
            'total_price.required'=>'Falta o preço',
            'total_price.numeric'=>'Preço Inválido',
            'plots.required'=>'Faltou as parcelas',
            'plots.numeric'=>'Preço Inválido',
            'plots.between'=>'Parcelas Inválidas',
            'plots_price.required'=>'required|numeric',
            'plots_price.numeric'=>'Preço Inválido',
            'available_to.required'=>'Data inválida',
            'days.between'=>'Data Inválida'
        ];
    }


    public function prepareForValidation()
    {
        $daysAdd = $this->days;
        $this->merge([
            "total_price"=>str_replace(',','.', $this->total_price),
            "plots_price"=>str_replace(',','.', $this->plots_price),
            'story_id'=>1,
            'available'=>'y',
            'available_to'=>Carbon::now()->addDay($daysAdd)->format('Y-m-d'),
            'gallery'=>'[image,image,image,image]'
        ]);
        return parent::prepareForValidation();
    }
}
