<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColegiaturaFormRequest;
use App\Models\ColegiaturaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColegiaturaController extends Controller
{
    /**
     * Página de inicio/bienvenida
     */
    public function index()
    {
        return view('index');
    }
    
    /**
     * Mostrar formulario de registro
     */
    public function create()
    {
        return view('create');
    }
    
    /**
     * Procesar solicitud y guardar archivos
     */
    public function store(ColegiaturaFormRequest $request)
    {
        $data = $request->validated();
        
        // Procesar archivos
        if ($request->hasFile('solicitud_pdf')) {
            $data['solicitud_pdf_path'] = $request->file('solicitud_pdf')
                ->store('colegiaturas/solicitudes', 'public');
        }
        
        if ($request->hasFile('foto')) {
            $data['foto_path'] = $request->file('foto')
                ->store('colegiaturas/fotos', 'public');
        }
        
        if ($request->hasFile('voucher')) {
            $data['voucher_path'] = $request->file('voucher')
                ->store('colegiaturas/vouchers', 'public');
        }
        
        if ($request->hasFile('diploma')) {
            $data['diploma_path'] = $request->file('diploma')
                ->store('colegiaturas/diplomas', 'public');
        }
        
        // Crear solicitud
        $solicitud = ColegiaturaRequest::create($data);
        
        // Redirigir a confirmación con ID
        return redirect()
            ->route('colegiatura.confirmation', ['id' => $solicitud->id])
            ->with('success', '¡Solicitud enviada exitosamente!');
    }
    
    /**
     * Mostrar confirmación con código de seguimiento
     */
    public function confirmation($id)
    {
        $solicitud = ColegiaturaRequest::findOrFail($id);
        return view('confirmation', compact('solicitud'));
    }
    
    /**
     * Formulario para rastrear solicitud
     */
    public function track()
    {
        return view('track');
    }
    
    /**
     * Mostrar status de solicitud por email o DNI
     */
    public function status(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string'],
        ], [
            'search.required' => 'Debe ingresar un email o DNI para buscar.',
        ]);
        
        $search = $request->input('search');
        
        // Buscar por email o DNI
        $solicitud = ColegiaturaRequest::where('email', $search)
            ->orWhere('dni', $search)
            ->first();
        
        if (!$solicitud) {
            return back()->with('error', 'No se encontró ninguna solicitud con esos datos.');
        }
        
        return view('status', compact('solicitud'));
    }

    /**
     * Mostrar formulario de registro de documentos
     */
    public function registro()
    {
        return view('registro');
    }

    /**
     * Procesar carga de documentos
     */
    public function storeRegistro(Request $request)
    {
        $request->validate([
            // Datos personales
            'apellidos_nombres' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255'],
            'celular' => ['required', 'string', 'max:15'],
            'dni' => ['required', 'string', 'size:8'],
            // Documentos
            'solicitud_incorporacion' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'ficha_personal' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'compromiso_honor' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'declaracion_jurada' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'ficha_carnet' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ], [
            'apellidos_nombres.required' => 'Los apellidos y nombres son obligatorios.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser válido.',
            'celular.required' => 'El número celular es obligatorio.',
            'dni.required' => 'El número de DNI es obligatorio.',
            'dni.size' => 'El DNI debe tener 8 dígitos.',
            'solicitud_incorporacion.required' => 'La Solicitud de Incorporación es obligatoria.',
            'solicitud_incorporacion.mimes' => 'La Solicitud debe ser un archivo PDF.',
            'ficha_personal.required' => 'La Ficha Personal es obligatoria.',
            'ficha_personal.mimes' => 'La Ficha Personal debe ser un archivo PDF.',
            'compromiso_honor.required' => 'El Compromiso de Honor es obligatorio.',
            'compromiso_honor.mimes' => 'El Compromiso debe ser un archivo PDF.',
            'declaracion_jurada.required' => 'La Declaración Jurada es obligatoria.',
            'declaracion_jurada.mimes' => 'La Declaración debe ser un archivo PDF.',
            'ficha_carnet.required' => 'La Ficha Carnet es obligatoria.',
            'ficha_carnet.mimes' => 'La Ficha Carnet debe ser PDF o imagen (JPG, PNG).',
            '*.max' => 'El archivo no debe exceder 5MB.',
        ]);

        // Guardar datos personales
        $datos = [
            'apellidos_nombres' => $request->input('apellidos_nombres'),
            'correo' => $request->input('correo'),
            'celular' => $request->input('celular'),
            'dni' => $request->input('dni'),
        ];

        // Guardar archivos
        $datos['solicitud_incorporacion'] = $request->file('solicitud_incorporacion')
            ->store('colegiaturas/documentos/solicitudes', 'public');
        
        $datos['ficha_personal'] = $request->file('ficha_personal')
            ->store('colegiaturas/documentos/fichas_personales', 'public');
        
        $datos['compromiso_honor'] = $request->file('compromiso_honor')
            ->store('colegiaturas/documentos/compromisos', 'public');
        
        $datos['declaracion_jurada'] = $request->file('declaracion_jurada')
            ->store('colegiaturas/documentos/declaraciones', 'public');
        
        $datos['ficha_carnet'] = $request->file('ficha_carnet')
            ->store('colegiaturas/documentos/carnets', 'public');

        // Guardar en base de datos
        ColegiaturaRequest::create($datos);

        return redirect()
            ->route('colegiatura.registro')
            ->with('success', '¡Registro completado! Tus datos se han guardado exitosamente.');
    }
}
