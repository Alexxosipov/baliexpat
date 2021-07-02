<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameEventRequest extends FormRequest
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
            'player_id' => ['nullable', 'required_without:player_name'],
            'player_name' => ['nullable', 'required_without:player_id'],
            'player_number' => ['nullable', 'required_without:player_id'],
            'event_type' => ['required', 'in:1,2,3,4'],
            'team_id' => ['required', 'exists:teams,id'],
            'minute' => ['required', 'numeric', 'min:1', 'max:120']
        ];
    }
}
