<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Dashboard as PagesDashboard;
use Filament\Pages\Page;

class Dashboard extends PagesDashboard
{
    protected function getActions(): array
    {
        return [
            Action::make('add')
                ->label('Tambah Pegawai')
                ->url(route('filament.admin.resources.employees.create'))
                ->icon('heroicon-o-plus-circle')
                ->color('primary'),

            Action::make('view')
                ->label('Lihat Pegawai')
                ->url(route('filament.admin.resources.employees.index'))
                ->icon('heroicon-o-eye')
                ->color('gray'),
        ];
    }

}
