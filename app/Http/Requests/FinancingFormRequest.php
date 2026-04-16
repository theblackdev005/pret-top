<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FloatNumberRule;

class FinancingFormRequest extends FormRequest
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
            'financing' => 'required|array',
            'financing.*' => 'required',
            'financing.montant_du_pret' => ['required', new FloatNumberRule()],
            'financing.devise_du_pret' => 'required|string',
            'financing.duree_totale_du_pret' => 'required|integer',
            'financing.revenu_mensuel' => ['nullable', new FloatNumberRule()],
            'financing.objectif_du_pret' => 'nullable|string',
            'financing.nom' => 'required|string',
            'financing.prenom' => 'required|string',
            'financing.adresse_complete' => 'required|string',
            'financing.adresse_codepostal' => 'nullable|string',
            'financing.adresse_ville' => 'nullable|string',
            'financing.adresse_pays' => 'required|string',
            'financing.email' => 'required|email',
            'financing.telephone' => 'required|string',
            'financing.sexe' => 'required|string',

            'financing.geo_city' => 'nullable|string',
            'financing.geo_country' => 'nullable|string',
            'financing.geo_region' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'financing.email.required' => translate(203),
            'financing.email.email' => translate(203),
        ];
    }
}
