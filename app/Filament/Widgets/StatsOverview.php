<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Actions\Action;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $total = Employee::count();
        $active = Employee::where('employment_status', 'Aktif')->count();
        $nonActive = Employee::where('employment_status', 'Non-aktif')->count();

        return [

            // Total Karyawan
            Stat::make('Total Karyawan', $total)
                ->description('Jumlah seluruh karyawan')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'dark:bg-primary-900/30',
                ]),

            // Karyawan Aktif
            Stat::make('Karyawan Aktif', $active)
                ->description('Sedang bekerja')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),

            // Karyawan Non-aktif
            Stat::make('Non-aktif', $nonActive)
                ->description('Tidak aktif / cuti / resign')
                ->descriptionIcon('heroicon-m-user-minus')
                ->color('danger'),

        ];
    }

    
}
