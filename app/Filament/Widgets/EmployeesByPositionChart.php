<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;

class EmployeesByPositionChart extends ChartWidget
{
    protected static ?string $heading = ' Grafik pegawai per jabatan ';

    protected function getData(): array
    {
        // Daftar posisi/jabatan
        $positions = ['Staff', 'Admin', 'Supervisor', 'Manager', 'Intern'];

        // Hitung jumlah pegawai per posisi
        $counts = array_map(function ($position) {
            return Employee::where('position', $position)->count();
        }, $positions);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pegawai',
                    'data' => $counts,
                ],
            ],
            'labels' => $positions,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
