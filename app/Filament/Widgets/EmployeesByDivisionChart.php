<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;

class EmployeesByDivisionChart extends ChartWidget
{
    protected static ?string $heading = 'Pegawai per Divisi';

    protected function getData(): array
    {
         $divisions = ['HRD','Finance','IT','Marketing','Operation','GA'];

        $counts = array_map(function ($division) {
            return Employee::where('division', $division)->count();
        }, $divisions);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pegawai',
                    'data' => $counts,
                ],
            ],
            'labels' => $divisions,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
