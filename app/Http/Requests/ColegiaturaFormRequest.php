<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegiaturaFormRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:colegiatura_requests,email'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'dni' => ['nullable', 'string', 'size:8', 'regex:/^[0-9]{8}$/'],
            
            // Archivos
            'solicitud_pdf' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:5120'], // 5MB
            'voucher' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'], // 5MB
            'diploma' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'], // 10MB
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'dni.size' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.regex' => 'El DNI debe contener solo números.',
            
            'solicitud_pdf.mimes' => 'La solicitud debe ser un archivo PDF.',
            'solicitud_pdf.max' => 'La solicitud no debe superar los 10 MB.',
            'foto.mimes' => 'La foto debe ser JPG o PNG.',
            'foto.max' => 'La foto no debe superar los 5 MB.',
            'voucher.mimes' => 'El voucher debe ser PDF, JPG o PNG.',
            'voucher.max' => 'El voucher no debe superar los 5 MB.',
            'diploma.mimes' => 'El diploma debe ser PDF, JPG o PNG.',
            'diploma.max' => 'El diploma no debe superar los 10 MB.',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     */
    public function attributes(): array
    {
        return [
            'nombres' => 'nombres',
            'apellidos' => 'apellidos',
            'email' => 'correo electrónico',
            'telefono' => 'teléfono',
            'dni' => 'DNI',
            'solicitud_pdf' => 'solicitud PDF',
            'foto' => 'fotografía',
            'voucher' => 'voucher de pago',
            'diploma' => 'diploma',
        ];
    }
}
