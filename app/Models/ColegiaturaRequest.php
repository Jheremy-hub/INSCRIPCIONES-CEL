<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColegiaturaRequest extends Model
{
    protected $fillable = [
        'apellidos_nombres',
        'correo',
        'celular',
        'dni',
        'solicitud_incorporacion_path',
        'ficha_personal_path',
        'compromiso_honor_path',
        'declaracion_jurada_path',
        'ficha_carnet_path',
        'status',
        'notas_admin',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Accessors para URLs públicas
    public function getSolicitudPdfUrlAttribute()
    {
        return $this->solicitud_pdf_path ? asset('storage/' . $this->solicitud_pdf_path) : null;
    }
    
    public function getFotoUrlAttribute()
    {
        return $this->foto_path ? asset('storage/' . $this->foto_path) : null;
    }
    
    public function getVoucherUrlAttribute()
    {
        return $this->voucher_path ? asset('storage/' . $this->voucher_path) : null;
    }
    
    public function getDiplomaUrlAttribute()
    {
        return $this->diploma_path ? asset('storage/' . $this->diploma_path) : null;
    }
    
    public function getNombreCompletoAttribute()
    {
        return trim($this->nombres . ' ' . $this->apellidos);
    }
    
    // Scopes
    public function scopePendiente($query)
    {
        return $query->where('status', 'pendiente');
    }
    
    public function scopeAprobado($query)
    {
        return $query->where('status', 'aprobado');
    }
    
    public function scopeRechazado($query)
    {
        return $query->where('status', 'rechazado');
    }
    
    // Helpers
    public function isPendiente()
    {
        return $this->status === 'pendiente';
    }
    
    public function isAprobado()
    {
        return $this->status === 'aprobado';
    }
    
    public function isRechazado()
    {
        return $this->status === 'rechazado';
    }
    
    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'pendiente' => 'bg-yellow-100 text-yellow-800',
            'aprobado' => 'bg-green-100 text-green-800',
            'rechazado' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
    
    public function getStatusLabel()
    {
        return match($this->status) {
            'pendiente' => 'Pendiente',
            'aprobado' => 'Aprobado',
            'rechazado' => 'Rechazado',
            default => 'Desconocido',
        };
    }
}
