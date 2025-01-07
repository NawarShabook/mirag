<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'user_name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'property_type' => 'required|string|max:50',
            'sector_code' => 'nullable|string|min:1|max:5',
            'block_number' => 'nullable|string|max:5',
            'building_number' => 'nullable|integer|min:0|max:99999',
            'manual_location' => 'nullable|string|max:255',
            'problem_information' => 'required|string|max:500',
            'workshop_id' => 'nullable|exists:workshops,id',
            'maintenance_service_id' => 'nullable|exists:maintenance_services,id',
            'heavy_machine_id' => 'nullable|exists:heavy_machines,id',
        ];

    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $workshop_id = $this->input('workshop_id');
            $maintenance_service_id = $this->input('maintenance_service_id');
            $heavy_machine_id = $this->input('heavy_machine_id');

            // Check that exactly one of the three fields is filled
            if (
                empty($workshop_id) +
                empty($maintenance_service_id) +
                empty($heavy_machine_id) !== 2
            ) {
                $validator->errors()->add('workshop_id', 'Exactly one of workshop_id, maintenance_service_id, or heavy_machine_id must be provided.');
            }
        });
    }
}
