<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


use App\Models\User;

class UsersExport implements FromCollection,WithHeadings
{
    protected $user;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        return $this->user->map(function ($user) {
            return [
                $user->role_id,
                $user->name,
                $user->surnames,
                $user->type_document,
                $user->document_number,
                $user->region,
                $user->city,
                $user->phone_number,
                $user->email,
                $user->status,
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'Apellidos',
            'Tipo documento',
            'Número documento',
            'Región',
            'Ciudad',
            'Telefono',
            'Email',
            'Estado',
            // Agregar más encabezados si es necesario.
        ];
    }
}


