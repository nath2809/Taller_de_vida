<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Activity;


class ActivityExport implements FromCollection,WithHeadings
{
    protected $activity;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($activity)
    {
        $this->activity = $activity;
    }

    public function collection()
    {
        return $this->activity->map(function ($activity) {
            return [
                $activity->id,
                $activity->type,
                $activity->name,
                $activity->description,
                $activity->city,
                $activity->participants,
                $activity->boys,
                $activity->girls,
    
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Id',
            'Tipo de Actividad',
            'Nombre',
            'Descripción',
            'Ciudad',
            'Participantes',
            'Cantidad de niños',
            'Cantidad de niñas',
        ];
    }

}


