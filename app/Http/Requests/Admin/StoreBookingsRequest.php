<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingsRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'room_id' => 'required',
            'time_from' => 'required|date_format:'.config('app.date_format').' H:i',
            'time_to' => 'required|date_format:'.config('app.date_format'). ' H:i',
            'additional_information' => 'required',
        ];
    }
}
